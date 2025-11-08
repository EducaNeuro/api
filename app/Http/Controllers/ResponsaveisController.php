<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponsavelRequest;
use App\Http\Requests\UpdateResponsavelRequest;
use App\Services\ResponsaveisService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponsaveisController extends Controller
{
    public function __construct(private readonly ResponsaveisService $responsaveisService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->responsaveisService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->responsaveisService->find($id));
    }

    public function store(StoreResponsavelRequest $request): JsonResponse
    {
        $responsavel = $this->responsaveisService->create($request->validated());

        return response()->json($responsavel, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateResponsavelRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $responsavel = $this->responsaveisService->update($id, $data);

        return response()->json($responsavel);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->responsaveisService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
