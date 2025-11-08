<?php

namespace App\Services;

use App\Repositories\EscolasRepository;

class EscolasService
{
    public function __construct(private readonly EscolasRepository $escolasRepository) {}
}
