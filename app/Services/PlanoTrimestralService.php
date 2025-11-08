<?php

namespace App\Services;

use App\Repositories\PlanoTrimestralRepository;

class PlanoTrimestralService
{
    public function __construct(private readonly PlanoTrimestralRepository $planoTrimestralRepository) {}
}
