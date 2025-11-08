<?php

namespace App\Repositories;

use App\Models\Educador;
use App\Models\Escola;
use App\Models\Secretaria;

class AuthRepository
{
    public function findEducadorByEmail(string $email): ?Educador
    {
        return Educador::where('email', $email)->first();
    }

    public function findEscolaByEmail(string $email): ?Escola
    {
        return Escola::where('email', $email)->first();
    }

    public function findSecretariaByEmail(string $email): ?Secretaria
    {
        return Secretaria::where('email', $email)->first();
    }

    public function findEducadorById(int $id): ?Educador
    {
        return Educador::find($id);
    }

    public function findEscolaById(int $id): ?Escola
    {
        return Escola::find($id);
    }

    public function findSecretariaById(int $id): ?Secretaria
    {
        return Secretaria::find($id);
    }
}
