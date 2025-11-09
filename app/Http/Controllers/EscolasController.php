<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEscolaRequest;
use App\Http\Requests\UpdateEscolaRequest;
use App\Services\EscolasService;
use App\Support\AuthContext;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EscolasController extends Controller
{
    public function __construct(private readonly EscolasService $escolasService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->escolasService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->escolasService->find($id));
    }

    public function store(StoreEscolaRequest $request): JsonResponse
    {
        $escola = $this->escolasService->create($request->validated());

        return response()->json($escola, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateEscolaRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $escola = $this->escolasService->update($id, $data);

        return response()->json($escola);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->escolasService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function statistics(): JsonResponse
    {
        $secretariaId = AuthContext::secretariaId();
        $escolas = $this->escolasService->getWithStatistics($secretariaId);

        return response()->json([
            'escolas' => $escolas,
            'total_escolas' => count($escolas),
            'secretaria_id' => $secretariaId
        ]);
    }
}
