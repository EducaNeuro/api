<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroPedagogicoRequest;
use App\Http\Requests\UpdateRegistroPedagogicoRequest;
use App\Services\RegistroPedagogicoService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegistroPedagogicoController extends Controller
{
    public function __construct(private readonly RegistroPedagogicoService $registroPedagogicoService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return response()->json($this->registroPedagogicoService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->registroPedagogicoService->find($id));
    }

    public function store(StoreRegistroPedagogicoRequest $request): JsonResponse
    {
        $registro = $this->registroPedagogicoService->create($request->validated());

        return response()->json($registro, Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateRegistroPedagogicoRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data === []) {
            return response()->json([
                'message' => 'Nenhum dado foi informado.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $registro = $this->registroPedagogicoService->update($id, $data);

        return response()->json($registro);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->registroPedagogicoService->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
