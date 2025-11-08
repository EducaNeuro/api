<?php

namespace App\Services;

use App\Models\Diagnostico;
use App\Repositories\DiagnosticosRepository;

class DiagnosticosService
{
    public function __construct(private readonly DiagnosticosRepository $diagnosticosRepository) {}

    public function all()
    {
        return $this->diagnosticosRepository->all();
    }

    public function find(int $id): Diagnostico
    {
        return $this->diagnosticosRepository->findOrFail($id);
    }

    public function create(array $data): Diagnostico
    {
        return $this->diagnosticosRepository->create($data);
    }

    public function update(int $id, array $data): Diagnostico
    {
        $diagnostico = $this->diagnosticosRepository->findOrFail($id);

        return $this->diagnosticosRepository->update($diagnostico, $data);
    }

    public function delete(int $id): void
    {
        $diagnostico = $this->diagnosticosRepository->findOrFail($id);
        $this->diagnosticosRepository->delete($diagnostico);
    }
}
