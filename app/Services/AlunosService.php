<?php

namespace App\Services;

use App\Repositories\AlunosRepository;

class AlunosService
{
    public function __construct(private readonly AlunosRepository $alunosRepository) {}
}
