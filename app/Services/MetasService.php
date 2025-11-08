<?php

namespace App\Services;

use App\Repositories\MetasRepository;

class MetasService
{
    public function __construct(private readonly MetasRepository $metasRepository) {}
}
