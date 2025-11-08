<?php

namespace App\Repositories;

use App\Models\Educador;

class AuthRepository
{
    public function findByCpf(string $cpf): ?Educador
    {
        return Educador::where('cpf', $cpf)->first();
    }

    public function findById(int $id): ?Educador
    {
        return Educador::find($id);
    }
}
