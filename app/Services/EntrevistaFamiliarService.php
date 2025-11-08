<?php

namespace App\Services;

use App\Repositories\EntrevistaFamiliarRepository;

class EntrevistaFamiliarService
{
    public function __construct(private readonly EntrevistaFamiliarRepository $entrevistaFamiliarRepository) {}
}
