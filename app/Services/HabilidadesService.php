<?php

namespace App\Services;

use App\Models\Habilidade;
use App\Repositories\HabilidadesRepository;

class HabilidadesService
{
    public function __construct(private readonly HabilidadesRepository $habilidadesRepository) {}

    public function create(array $data): Habilidade
    {
        return $this->habilidadesRepository->create($data);
    }

    public function update(int $id, array $data): Habilidade
    {
        $habilidade = $this->habilidadesRepository->findOrFail($id);

        return $this->habilidadesRepository->update($habilidade, $data);
    }

    public function delete(int $id): void
    {
        $habilidade = $this->habilidadesRepository->findOrFail($id);
        $this->habilidadesRepository->delete($habilidade);
    }
}
