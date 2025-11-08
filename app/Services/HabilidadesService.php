<?php

namespace App\Services;

use App\Repositories\HabilidadesRepository;

class HabilidadesService
{
    public function __construct(private readonly HabilidadesRepository $habilidadesRepository) {}
}
