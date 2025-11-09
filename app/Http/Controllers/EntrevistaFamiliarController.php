<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntrevistaFamiliarRequest;
use App\Http\Requests\UpdateEntrevistaFamiliarRequest;
use App\Services\EntrevistaFamiliarService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EntrevistaFamiliarController extends Controller
{
    public function __construct(private readonly EntrevistaFamiliarService $entrevistaFamiliarService)
    {
        //
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $alunoId = request()->query('aluno_id');

        if ($alunoId) {
            $entrevistaFamiliar = $this->entrevistaFamiliarService->findByAlunoId((int) $alunoId);
            return response()->json($entrevistaFamiliar);
        }

        return response()->json([
            'message' => 'Parâmetro aluno_id é obrigatório.'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(int $id): JsonResponse
    {
        $entrevistaFamiliar = $this->entrevistaFamiliarService->find($id);
        return response()->json($entrevistaFamiliar);
    }

    public function store(StoreEntrevistaFamiliarRequest $request): JsonResponse
    {
        $entrevistaFamiliar = $this->entrevistaFamiliarService->create($request->validated());

        return response()->json($entrevistaFamiliar, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateEntrevistaFamiliarRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $entrevistaFamiliar = $this->entrevistaFamiliarService->update($id, $data);

        return response()->json($entrevistaFamiliar);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->entrevistaFamiliarService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
