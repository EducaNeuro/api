<?php

namespace App\Services;

use App\Repositories\RegistroPedagogicoRepository;

class RegistroPedagogicoService
{
    public function __construct(private readonly RegistroPedagogicoRepository $registroPedagogicoRepository) {}
}
