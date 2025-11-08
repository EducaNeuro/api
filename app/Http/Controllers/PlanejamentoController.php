<?php

namespace App\Http\Controllers;

use App\Services\PlanejamentoService;
use Illuminate\Http\Request;

class PlanejamentoController extends Controller
{
    public function __construct(private readonly PlanejamentoService $planejamentoService)
    {
        //
    }

}
