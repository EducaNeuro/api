<?php

namespace App\Services;

use App\Repositories\InventarioHabilidadesRepository;
use App\Models\InventarioHabilidade;

class InventarioHabilidadesService
{
    public function __construct(private readonly InventarioHabilidadesRepository $inventarioHabilidadesRepository) {}

    public function create(array $data): InventarioHabilidade
    {
        return $this->inventarioHabilidadesRepository->create($data);
    }
}
