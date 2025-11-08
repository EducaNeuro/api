<?php

namespace App\Http\Controllers;

use App\Services\DiagnosticosService;
use Illuminate\Http\Request;

class DiagnosticosController extends Controller
{
    public function __construct(private readonly DiagnosticosService $diagnosticosService)
    {
        //
    }

}
