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
