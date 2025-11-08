<?php

namespace App\Services;

use App\Repositories\EducadoresRepository;

class EducadoresService
{
    public function __construct(private readonly EducadoresRepository $educadoresRepository) {}
}
