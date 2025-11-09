<?php

namespace App\Services;

use App\Repositories\InventarioHabilidadesRepository;
use App\Models\InventarioHabilidade;

class InventarioHabilidadesService
{
    public function __construct(private readonly InventarioHabilidadesRepository $inventarioHabilidadesRepository) {}

    public function all()
    {
        return $this->inventarioHabilidadesRepository->all();
    }

    public function create(array $data): InventarioHabilidade
    {
        return $this->inventarioHabilidadesRepository->create($data);
    }

    public function find(int $id): InventarioHabilidade
    {
        return $this->inventarioHabilidadesRepository->findOrFail($id);
    }

    public function findByAlunoId(int $alunoId): ?InventarioHabilidade
    {
        return $this->inventarioHabilidadesRepository->findByAlunoId($alunoId);
    }
}
