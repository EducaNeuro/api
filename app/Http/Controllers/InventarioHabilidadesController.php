<?php

namespace App\Http\Controllers;

use App\Services\InventarioHabilidadesService;
use Illuminate\Http\Request;

class InventarioHabilidadesController extends Controller
{
    public function __construct(private readonly InventarioHabilidadesService $inventarioHabilidadesService)
    {
        //
    }

}
