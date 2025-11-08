<?php

namespace App\Http\Controllers;

use App\Services\RegistroPedagogicoService;
use Illuminate\Http\Request;

class RegistroPedagogicoController extends Controller
{
    public function __construct(private readonly RegistroPedagogicoService $registroPedagogicoService)
    {
        //
    }

}
