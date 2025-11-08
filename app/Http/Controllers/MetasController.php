<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMetaRequest;
use App\Http\Requests\UpdateMetaRequest;
use App\Services\MetasService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MetasController extends Controller
{
    public function __construct(private readonly MetasService $metasService)
    {
        //
    }

    public function store(StoreMetaRequest $request): JsonResponse
    {
        $meta = $this->metasService->create($request->validated());

        return response()->json($meta, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateMetaRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $meta = $this->metasService->update($id, $data);

        return response()->json($meta);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->metasService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
