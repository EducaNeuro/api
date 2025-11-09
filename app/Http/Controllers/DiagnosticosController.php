<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiagnosticoRequest;
use App\Http\Requests\UpdateDiagnosticoRequest;
use App\Services\DiagnosticosService;
use App\Support\AuthContext;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DiagnosticosController extends Controller
{
    public function __construct(private readonly DiagnosticosService $diagnosticosService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->diagnosticosService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->diagnosticosService->find($id));
    }

    public function store(StoreDiagnosticoRequest $request): JsonResponse
    {
        $diagnostico = $this->diagnosticosService->create($request->validated());

        return response()->json($diagnostico, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateDiagnosticoRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $diagnostico = $this->diagnosticosService->update($id, $data);

        return response()->json($diagnostico);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->diagnosticosService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function ranking(): JsonResponse
    {
        $escolaId = AuthContext::escolaId();
        $ranking = $this->diagnosticosService->getRanking($escolaId);

        return response()->json([
            'ranking' => $ranking,
            'total_diagnosticos' => count($ranking),
            'escola_id' => $escolaId
        ]);
    }
}
