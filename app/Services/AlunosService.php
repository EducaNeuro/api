<?php

namespace App\Services;

use App\Models\Aluno;
use App\Repositories\AlunosRepository;
use App\Support\AuthContext;

class AlunosService
{
    public function __construct(private readonly AlunosRepository $alunosRepository) {}

    public function all()
    {
        $escolaId = AuthContext::escolaId();
        return $this->alunosRepository->all($escolaId);
    }

    public function create(array $data): Aluno
    {
        return $this->alunosRepository->create($data);
    }

    public function find(int $id): Aluno
    {
        return $this->alunosRepository->findOrFail($id);
    }

    public function update(int $id, array $data): Aluno
    {
        $aluno = $this->alunosRepository->findOrFail($id);

        return $this->alunosRepository->update($aluno, $data);
    }

    public function delete(int $id): void
    {
        $aluno = $this->alunosRepository->findOrFail($id);
        $this->alunosRepository->delete($aluno);
    }
}
