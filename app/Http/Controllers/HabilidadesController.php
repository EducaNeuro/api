<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabilidadeRequest;
use App\Http\Requests\UpdateHabilidadeRequest;
use App\Services\HabilidadesService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HabilidadesController extends Controller
{
    public function __construct(private readonly HabilidadesService $habilidadesService)
    {
        //
    }

    public function store(StoreHabilidadeRequest $request): JsonResponse
    {
        $habilidade = $this->habilidadesService->create($request->validated());

        return response()->json($habilidade, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateHabilidadeRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $habilidade = $this->habilidadesService->update($id, $data);

        return response()->json($habilidade);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->habilidadesService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
