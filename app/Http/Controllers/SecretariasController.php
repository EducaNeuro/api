<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecretariaRequest;
use App\Http\Requests\UpdateSecretariaRequest;
use App\Services\SecretariasService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SecretariasController extends Controller
{
    public function __construct(private readonly SecretariasService $secretariasService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->secretariasService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->secretariasService->find($id));
    }

    public function store(StoreSecretariaRequest $request): JsonResponse
    {
        $secretaria = $this->secretariasService->create($request->validated());

        return response()->json($secretaria, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateSecretariaRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $secretaria = $this->secretariasService->update($id, $data);

        return response()->json($secretaria);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->secretariasService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
