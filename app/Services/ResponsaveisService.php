<?php

namespace App\Services;

use App\Models\Responsavel;
use App\Repositories\ResponsaveisRepository;

class ResponsaveisService
{
    public function __construct(private readonly ResponsaveisRepository $responsaveisRepository) {}

    public function create(array $data): Responsavel
    {
        return $this->responsaveisRepository->create($data);
    }

    public function update(int $id, array $data): Responsavel
    {
        $responsavel = $this->responsaveisRepository->findOrFail($id);

        return $this->responsaveisRepository->update($responsavel, $data);
    }

    public function delete(int $id): void
    {
        $responsavel = $this->responsaveisRepository->findOrFail($id);
        $this->responsaveisRepository->delete($responsavel);
    }
}
