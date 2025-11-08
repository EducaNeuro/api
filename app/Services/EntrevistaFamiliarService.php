<?php

namespace App\Services;

use App\Models\EntrevistaFamiliar;
use App\Repositories\EntrevistaFamiliarRepository;

class EntrevistaFamiliarService
{
    public function __construct(private readonly EntrevistaFamiliarRepository $entrevistaFamiliarRepository) {}

    public function create(array $data): EntrevistaFamiliar
    {
        return $this->entrevistaFamiliarRepository->create($data);
    }

    public function update(int $id, array $data): EntrevistaFamiliar
    {
        $entrevistaFamiliar = $this->entrevistaFamiliarRepository->findOrFail($id);

        return $this->entrevistaFamiliarRepository->update($entrevistaFamiliar, $data);
    }

    public function delete(int $id): void
    {
        $entrevistaFamiliar = $this->entrevistaFamiliarRepository->findOrFail($id);
        $this->entrevistaFamiliarRepository->delete($entrevistaFamiliar);
    }
}
