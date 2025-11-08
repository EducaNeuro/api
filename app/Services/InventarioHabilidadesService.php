<?php

namespace App\Services;

use App\Repositories\InventarioHabilidadesRepository;

class InventarioHabilidadesService
{
    public function __construct(private readonly InventarioHabilidadesRepository $inventarioHabilidadesRepository) {}
}
