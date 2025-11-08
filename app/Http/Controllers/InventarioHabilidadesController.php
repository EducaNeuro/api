<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHabilidadesIndividuaisRequest;
use App\Models\InventarioHabilidade;
use App\Services\InventarioHabilidadesService;
use Illuminate\Http\JsonResponse;

class InventarioHabilidadesController extends Controller
{
    public function __construct(private readonly InventarioHabilidadesService $inventarioHabilidadesService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->inventarioHabilidadesService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->inventarioHabilidadesService->find($id));
    }

    public function create(CreateHabilidadesIndividuaisRequest $request): JsonResponse
    {
        $inventario = $this->inventarioHabilidadesService->create($request->validated());

        return response()->json($inventario, 201);
    }

}
