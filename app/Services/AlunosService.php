<?php

namespace App\Services;

use App\Models\Aluno;
use App\Repositories\AlunosRepository;

class AlunosService
{
    public function __construct(private readonly AlunosRepository $alunosRepository) {}

    public function all()
    {
        return $this->alunosRepository->all();
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
