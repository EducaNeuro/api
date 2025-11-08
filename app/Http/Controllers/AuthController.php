<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function login(AuthRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $result = $this->authService->attempt(
            $credentials['email'],
            $credentials['password'],
        );

        if (! $result) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'token' => $result['access_token'],
            'token_type' => $result['token_type'],
            'expires_in' => $result['expires_in'],
            'tipo' => $result['user_type'],
            'usuario' => $this->transformUser($result['user'], $result['user_type']),
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->attributes->get('auth_user');
        $type = $request->attributes->get('auth_user_type');

        if (! $user || ! $type) {
            return response()->json([
                'message' => 'Não autorizado.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'tipo' => $type,
            'usuario' => $this->transformUser($user, $type),
        ]);
    }

    private function transformUser(object $user, string $type): array
    {
        return match ($type) {
            AuthService::TYPE_EDUCADOR => [
                'id' => $user->id,
                'email' => $user->email,
                'cpf' => $user->cpf,
                'telefone' => $user->telefone,
                'disciplina' => $user->disciplina,
                'turno' => $user->turno,
            ],
            AuthService::TYPE_ESCOLA => [
                'id' => $user->id,
                'nome' => $user->nome,
                'email' => $user->email,
                'secretaria_id' => $user->secretaria_id,
            ],
            AuthService::TYPE_SECRETARIA => [
                'id' => $user->id,
                'nome' => $user->nome,
                'email' => $user->email,
                'ativo' => $user->ativo,
                'latitude' => $user->latitude,
                'longitude' => $user->longitude,
            ],
            default => [
                'id' => $user->id,
                'email' => $user->email,
            ],
        };
    }
}
