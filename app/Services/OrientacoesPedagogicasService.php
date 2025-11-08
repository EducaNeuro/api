<?php

namespace App\Services;

use App\Repositories\OrientacoesPedagogicasRepository;

class OrientacoesPedagogicasService
{
    public function __construct(private readonly OrientacoesPedagogicasRepository $orientacoesPedagogicasRepository) {}
}
