<?php

namespace App\Services;

use App\Models\Educador;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthService
{
    private const TOKEN_TTL_MINUTES = 120;

    public function __construct(private readonly AuthRepository $authRepository) {}

    public function attempt(string $cpf, string $password): ?array
    {
        $educador = $this->authRepository->findByCpf($cpf);

        if (! $educador || ! Hash::check($password, $educador->senha)) {
            return null;
        }

        $token = $this->encodeToken($educador);

        return [
            'educador' => $educador,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => self::TOKEN_TTL_MINUTES * 60,
        ];
    }

    public function authenticateWithToken(string $token): ?Educador
    {
        $payload = $this->decodeToken($token);

        if (! $payload) {
            return null;
        }

        $expiresAt = $payload['exp'] ?? 0;

        if ($expiresAt < now()->timestamp) {
            return null;
        }

        $educadorId = $payload['sub'] ?? null;

        if (! $educadorId) {
            return null;
        }

        return $this->authRepository->findById((int) $educadorId);
    }

    private function encodeToken(Educador $educador): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ];

        $payload = [
            'sub' => $educador->id,
            'email' => $educador->email,
            'cpf' => $educador->cpf,
            'iat' => now()->timestamp,
            'exp' => now()->addMinutes(self::TOKEN_TTL_MINUTES)->timestamp,
        ];

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
