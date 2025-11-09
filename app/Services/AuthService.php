<?php

namespace App\Services;

use App\Models\Educador;
use App\Models\Escola;
use App\Models\Secretaria;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthService
{
    private const TOKEN_TTL_MINUTES = 120;

    public const TYPE_EDUCADOR = 'educador';
    public const TYPE_ESCOLA = 'escola';
    public const TYPE_SECRETARIA = 'secretaria';

    public function __construct(private readonly AuthRepository $authRepository) {}

    public function attempt(string $email, string $password): ?array
    {
        $userData = $this->findUserByEmail($email);

        if (! $userData) {
            return null;
        }

        [$user, $type] = $userData;

        if (! Hash::check($password, $user->password)) {
            return null;
        }

        $token = $this->encodeToken($user, $type);

        return [
            'user' => $user,
            'user_type' => $type,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => self::TOKEN_TTL_MINUTES * 60000000,
        ];
    }

    /**
     * @return array{user:Educador|Escola|Secretaria,type:string}|null
     */
    public function authenticateWithToken(string $token): ?array
    {
        $payload = $this->decodeToken($token);

        if (! $payload) {
            return null;
        }

        $expiresAt = $payload['exp'] ?? 0;

        if ($expiresAt < now()->timestamp) {
            return null;
        }

        $userId = $payload['sub'] ?? null;
        $type = $payload['type'] ?? null;

        if (! $userId || ! $type) {
            return null;
        }

        $user = match ($type) {
            self::TYPE_EDUCADOR => $this->authRepository->findEducadorById((int) $userId),
            self::TYPE_ESCOLA => $this->authRepository->findEscolaById((int) $userId),
            self::TYPE_SECRETARIA => $this->authRepository->findSecretariaById((int) $userId),
            default => null,
        };

        if (! $user) {
            return null;
        }

        return [
            'user' => $user,
            'type' => $type,
        ];
    }

    /**
     * @return array{0: Educador|Escola|Secretaria, 1: string}|null
     */
    private function findUserByEmail(string $email): ?array
    {
        if ($educador = $this->authRepository->findEducadorByEmail($email)) {
            return [$educador, self::TYPE_EDUCADOR];
        }

        if ($escola = $this->authRepository->findEscolaByEmail($email)) {
            return [$escola, self::TYPE_ESCOLA];
        }

        if ($secretaria = $this->authRepository->findSecretariaByEmail($email)) {
            return [$secretaria, self::TYPE_SECRETARIA];
        }

        return null;
    }

    private function encodeToken(Educador|Escola|Secretaria $user, string $type): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ];

        $payload = [
            'sub' => $user->id,
            'email' => $user->email,
            'type' => $type,
            'iat' => now()->timestamp,
            'exp' => now()->addMinutes(self::TOKEN_TTL_MINUTES)->timestamp,
        ];

        if ($type === self::TYPE_EDUCADOR && $user instanceof Educador) {
            $payload['cpf'] = $user->cpf;
        }

        $segments = [
            $this->base64UrlEncode(json_encode($header, JSON_THROW_ON_ERROR)),
            $this->base64UrlEncode(json_encode($payload, JSON_THROW_ON_ERROR)),
        ];

        $signingInput = implode('.', $segments);
        $signature = hash_hmac('sha256', $signingInput, $this->getSecret(), true);
        $segments[] = $this->base64UrlEncode($signature);

        return implode('.', $segments);
    }

    private function decodeToken(string $token): ?array
    {
        $segments = explode('.', $token);

        if (count($segments) !== 3) {
            return null;
        }

        [$encodedHeader, $encodedPayload, $encodedSignature] = $segments;

        $signingInput = $encodedHeader . '.' . $encodedPayload;
        $expectedSignature = $this->base64UrlEncode(
            hash_hmac('sha256', $signingInput, $this->getSecret(), true)
        );

        if (! hash_equals($expectedSignature, $encodedSignature)) {
            return null;
        }

        try {
            $payload = json_decode($this->base64UrlDecode($encodedPayload), true, 512, JSON_THROW_ON_ERROR);
        } catch (Throwable) {
            return null;
        }

        return $payload;
    }

    private function base64UrlEncode(string $value): string
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    private function base64UrlDecode(string $value): string
    {
        $remainder = strlen($value) % 4;
        if ($remainder) {
            $value .= str_repeat('=', 4 - $remainder);
        }

        return base64_decode(strtr($value, '-_', '+/'));
    }

    private function getSecret(): string
    {
        $key = config('app.key');

        if (str_starts_with($key, 'base64:')) {
            $decoded = base64_decode(substr($key, 7));

            if ($decoded !== false) {
                return $decoded;
            }
        }

        return $key;
    }
}
