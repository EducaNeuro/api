<?php

namespace App\Services;

use App\Models\Educador;
use App\Repositories\EducadoresRepository;
use App\Support\AuthContext;
use Illuminate\Support\Facades\Hash;

class EducadoresService
{
    public function __construct(private readonly EducadoresRepository $educadoresRepository) {}

    public function all()
    {
        $escolaId = AuthContext::escolaId();

        return $this->educadoresRepository->all($escolaId);
    }

    public function create(array $data): Educador
    {
        $primeiros3Cpf = substr(preg_replace('/\D/', '', $data['cpf']), 0, 3);
        $primeiros3Email = substr($data['email'], 0, 3);
        $primeiros3Telefone = substr($data['telefone'], 0, 3);
        $password = $primeiros3Cpf . $primeiros3Email . $primeiros3Telefone;

        if (array_key_exists('password', $data)) {
            // Gera senha com primeiros 3 caracteres de cada informação: CPF, email e telefone
            $data['password'] = Hash::make($data['cpf'] . $data['email'] . $data['telefone']);
        }

        if ($escolaId = AuthContext::escolaId()) {
            $data['escola_id'] = $escolaId;
        }

        return $this->educadoresRepository->create($data);
    }

    public function find(int $id): Educador
    {
        $escolaId = AuthContext::escolaId();

        return $this->educadoresRepository->findOrFail($id, $escolaId);
    }

    public function update(int $id, array $data): Educador
    {
        $escolaId = AuthContext::escolaId();
        $educador = $this->educadoresRepository->findOrFail($id, $escolaId);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        if ($escolaId) {
            $data['escola_id'] = $escolaId;
        }

        return $this->educadoresRepository->update($educador, $data);
    }

    public function delete(int $id): void
    {
        $escolaId = AuthContext::escolaId();
        $educador = $this->educadoresRepository->findOrFail($id, $escolaId);
        $this->educadoresRepository->delete($educador);
    }
}
