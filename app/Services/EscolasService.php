<?php

namespace App\Services;

use App\Models\Escola;
use App\Repositories\EscolasRepository;

class EscolasService
{
    public function __construct(private readonly EscolasRepository $escolasRepository) {}

    public function create(array $data): Escola
    {
        return $this->escolasRepository->create($data);
    }

    public function update(int $id, array $data): Escola
    {
        $escola = $this->escolasRepository->findOrFail($id);

        return $this->escolasRepository->update($escola, $data);
    }

    public function delete(int $id): void
    {
        $escola = $this->escolasRepository->findOrFail($id);
        $this->escolasRepository->delete($escola);
    }
}
