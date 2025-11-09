<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrientacaoPedagogicaRequest;
use App\Http\Requests\UpdateOrientacaoPedagogicaRequest;
use App\Services\OrientacoesPedagogicasService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class OrientacoesPedagogicasController extends Controller
{
    public function __construct(private readonly OrientacoesPedagogicasService $orientacoesPedagogicasService)
    {
        //
    }

    public function index(Request $request): JsonResponse
    {
        $alunoId = $request->query('aluno_id');

        if ($alunoId) {
            $orientacoesPedagogicas = $this->orientacoesPedagogicasService->findByAlunoId((int) $alunoId);
            return response()->json($orientacoesPedagogicas);
        }

        return response()->json([
            'message' => 'Parâmetro aluno_id é obrigatório.'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->orientacoesPedagogicasService->find($id));
    }

    public function store(StoreOrientacaoPedagogicaRequest $request): JsonResponse
    {
        $orientacao = $this->orientacoesPedagogicasService->create($request->validated());

        return response()->json($orientacao, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateOrientacaoPedagogicaRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $orientacao = $this->orientacoesPedagogicasService->update($id, $data);

        return response()->json($orientacao);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->orientacoesPedagogicasService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
