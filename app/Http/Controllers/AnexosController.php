<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnexoRequest;
use App\Http\Requests\UpdateAnexoRequest;
use App\Services\AnexosService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AnexosController extends Controller
{
    public function __construct(private readonly AnexosService $anexosService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->anexosService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->anexosService->find($id));
    }

    public function store(StoreAnexoRequest $request): JsonResponse
    {
        $anexo = $this->anexosService->create(
            $request->validated(),
            $request->file('file')
        );

        return response()->json($anexo, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateAnexoRequest $request): JsonResponse
    {
        $data = $request->validated();
        $file = $request->file('file');

        if ($data === [] && ! $file) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $anexo = $this->anexosService->update($id, $data, $file);

        return response()->json($anexo);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->anexosService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
