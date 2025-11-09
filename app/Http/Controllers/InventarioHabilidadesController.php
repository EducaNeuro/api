<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHabilidadesIndividuaisRequest;
use App\Http\Requests\IndexInventarioHabilidadesRequest;
use App\Models\InventarioHabilidade;
use App\Services\InventarioHabilidadesService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InventarioHabilidadesController extends Controller
{
    public function __construct(private readonly InventarioHabilidadesService $inventarioHabilidadesService)
    {
    }

    public function index(IndexInventarioHabilidadesRequest $request): JsonResponse
    {
        $alunoId = $request->validated()['aluno_id'];
        $inventarioHabilidade = $this->inventarioHabilidadesService->findByAlunoId($alunoId);
        
        return response()->json($inventarioHabilidade);
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
