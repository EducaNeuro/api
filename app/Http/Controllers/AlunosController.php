<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Services\AlunosService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AlunosController extends Controller
{
    public function __construct(private readonly AlunosService $alunosService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->alunosService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->alunosService->find($id));
    }

    public function details(int $id): JsonResponse
    {
        return response()->json($this->alunosService->fullDetails($id));
    }

    public function store(StoreAlunoRequest $request): JsonResponse
    {
        $aluno = $this->alunosService->create($request->validated());

        return response()->json($aluno, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateAlunoRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $aluno = $this->alunosService->update($id, $data);

        return response()->json($aluno);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->alunosService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
