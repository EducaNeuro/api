<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanoTrimestralRequest;
use App\Http\Requests\UpdatePlanoTrimestralRequest;
use App\Services\PlanoTrimestralService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class PlanoTrimestralController extends Controller
{
    public function __construct(private readonly PlanoTrimestralService $planoTrimestralService)
    {
        //
    }

    public function index(Request $request): JsonResponse
    {
        $alunoId = $request->query('aluno_id');

        if ($alunoId) {
            $planoTrimestral = $this->planoTrimestralService->findByAlunoId((int) $alunoId);
            return response()->json($planoTrimestral);
        }

        return response()->json([
            'message' => 'Parâmetro aluno_id é obrigatório.'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->planoTrimestralService->find($id));
    }

    public function store(StorePlanoTrimestralRequest $request): JsonResponse
    {
        $plano = $this->planoTrimestralService->create($request->validated());

        return response()->json($plano, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdatePlanoTrimestralRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $plano = $this->planoTrimestralService->update($id, $data);

        return response()->json($plano);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->planoTrimestralService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
