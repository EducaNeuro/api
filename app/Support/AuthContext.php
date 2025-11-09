<?php

namespace App\Support;

use App\Services\AuthService;

class AuthContext
{
    private static ?object $user = null;
    private static ?string $type = null;

    public static function set(object $user, string $type): void
    {
        self::$user = $user;
        self::$type = $type;
    }

    public static function user(): ?object
    {
        return self::$user;
    }

    public static function type(): ?string
    {
        return self::$type;
    }

    public static function clear(): void
    {
        self::$user = null;
        self::$type = null;
    }

    public static function escolaId(): ?int
    {
        if (self::$type === AuthService::TYPE_ESCOLA && self::$user) {
            return self::$user->id ?? null;
        }

        if (self::$type === AuthService::TYPE_EDUCADOR && self::$user) {
            return self::$user->escola_id ?? null;
        }

        return null;
    }

    public static function secretariaId(): ?int
    {
        if (self::$type === AuthService::TYPE_SECRETARIA && self::$user) {
            return self::$user->id ?? null;
        }

        if (self::$type === AuthService::TYPE_ESCOLA && self::$user) {
            return self::$user->secretaria_id ?? null;
        }

        if (self::$type === AuthService::TYPE_EDUCADOR && self::$user) {
            // Educador tem escola_id, precisa buscar a secretaria através da escola
            $escolaId = self::$user->escola_id ?? null;
            
            if (!$escolaId) {
                return null;
            }

            $escola = \App\Models\Escola::find($escolaId);
            
            return $escola?->secretaria_id ?? null;
        }

        return null;
    }
}
