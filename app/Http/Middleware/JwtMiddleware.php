<?php

namespace App\Http\Middleware;

use App\Services\AuthService;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    public function __construct(private readonly AuthService $authService) {}

    public function handle(Request $request, Closure $next)
    {
        $token = $this->extractToken($request);

        if (! $token) {
            return $this->unauthorizedResponse();
        }

        $educador = $this->authService->authenticateWithToken($token);

        if (! $educador) {
            return $this->unauthorizedResponse();
        }

        $request->attributes->set('educador', $educador);
        $request->setUserResolver(static fn () => $educador);

        return $next($request);
    }

    private function extractToken(Request $request): ?string
    {
        $authorizationHeader = $request->header('Authorization');

        if ($authorizationHeader && str_starts_with($authorizationHeader, 'Bearer ')) {
            return substr($authorizationHeader, 7);
        }

        return $request->query('token');
    }

    private function unauthorizedResponse(): JsonResponse
    {
        return response()->json([
            'message' => 'Não autorizado.',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
