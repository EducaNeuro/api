<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function login(AuthRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $result = $this->authService->attempt(
            $credentials['cpf'],
            $credentials['password'],
        );

        if (! $result) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        /** @var \App\Models\Educador $educador */
        $educador = $result['educador'];

        return response()->json([
            'token' => $result['access_token'],
            'token_type' => $result['token_type'],
            'expires_in' => $result['expires_in'],
            'educador' => [
                'id' => $educador->id,
                'email' => $educador->email,
                'cpf' => $educador->cpf,
                'telefone' => $educador->telefone,
                'disciplina' => $educador->disciplina,
                'turno' => $educador->turno,
            ],
        ]);
    }
}
