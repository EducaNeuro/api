<?php

namespace App\Http\Controllers;

use App\Services\InventarioHabilidadesService;
use Illuminate\Http\Request;
use App\Models\InventarioHabilidade;
use App\Http\Requests\CreateHabilidadesIndividuaisRequest;

class InventarioHabilidadesController extends Controller
{
    public function __construct(private readonly InventarioHabilidadesService $inventarioHabilidadesService)
    {
    }

    public function create(CreateHabilidadesIndividuaisRequest $request): InventarioHabilidade
    {
        return $this->inventarioHabilidadesService->create($request->validated());
    }

}
