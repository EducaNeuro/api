<?php

namespace App\Services;

use App\Repositories\SecretariasRepository;

class SecretariasService
{
    public function __construct(private readonly SecretariasRepository $secretariasRepository) {}
}
