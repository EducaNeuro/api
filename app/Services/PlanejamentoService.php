<?php

namespace App\Services;

use App\Repositories\PlanejamentoRepository;

class PlanejamentoService
{
    public function __construct(private readonly PlanejamentoRepository $planejamentoRepository) {}
}
