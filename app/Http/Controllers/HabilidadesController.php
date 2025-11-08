<?php

namespace App\Http\Controllers;

use App\Services\HabilidadesService;
use Illuminate\Http\Request;

class HabilidadesController extends Controller
{
    public function __construct(private readonly HabilidadesService $habilidadesService)
    {
        //
    }

}
