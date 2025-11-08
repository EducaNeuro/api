<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanejamentoRequest;
use App\Http\Requests\UpdatePlanejamentoRequest;
use App\Services\PlanejamentoService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PlanejamentoController extends Controller
{
    public function __construct(private readonly PlanejamentoService $planejamentoService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->planejamentoService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->planejamentoService->find($id));
    }

    public function store(StorePlanejamentoRequest $request): JsonResponse
    {
        $planejamento = $this->planejamentoService->create($request->validated());

        return response()->json($planejamento, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdatePlanejamentoRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $planejamento = $this->planejamentoService->update($id, $data);

        return response()->json($planejamento);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->planejamentoService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
