<?php

namespace App\Services;

use App\Repositories\DiagnosticosRepository;

class DiagnosticosService
{
    public function __construct(private readonly DiagnosticosRepository $diagnosticosRepository) {}
}
