<?php

namespace App\Services;

use App\Repositories\ResponsaveisRepository;

class ResponsaveisService
{
    public function __construct(private readonly ResponsaveisRepository $responsaveisRepository) {}
}
