<?php

namespace App\Services;

use App\Models\PlanoTrimestral;
use App\Repositories\PlanoTrimestralRepository;

class PlanoTrimestralService
{
    public function __construct(private readonly PlanoTrimestralRepository $planoTrimestralRepository) {}

    public function all()
    {
        return $this->planoTrimestralRepository->all();
    }

    public function findByAlunoId(int $alunoId): ?PlanoTrimestral
    {
        return $this->planoTrimestralRepository->findByAlunoId($alunoId);
    }

    public function find(int $id): PlanoTrimestral
    {
        return $this->planoTrimestralRepository->findOrFail($id);
    }

    public function create(array $data): PlanoTrimestral
    {
        return $this->planoTrimestralRepository->create($data);
    }

    public function update(int $id, array $data): PlanoTrimestral
    {
        $plano = $this->planoTrimestralRepository->findOrFail($id);

        return $this->planoTrimestralRepository->update($plano, $data);
    }

    public function delete(int $id): void
    {
        $plano = $this->planoTrimestralRepository->findOrFail($id);
        $this->planoTrimestralRepository->delete($plano);
    }
}
