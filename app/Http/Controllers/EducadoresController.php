<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducadorRequest;
use App\Http\Requests\UpdateEducadorRequest;
use App\Services\EducadoresService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EducadoresController extends Controller
{
    public function __construct(private readonly EducadoresService $educadoresService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->educadoresService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->educadoresService->find($id));
    }

    public function store(StoreEducadorRequest $request): JsonResponse
    {
        $educador = $this->educadoresService->create($request->validated());

        return response()->json($educador, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateEducadorRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $educador = $this->educadoresService->update($id, $data);

        return response()->json($educador);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->educadoresService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
