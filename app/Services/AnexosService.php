<?php

namespace App\Services;

use App\Repositories\AnexosRepository;

class AnexosService
{
    public function __construct(private readonly AnexosRepository $anexosRepository) {}
}
