<?php

namespace App\Services;

use App\Models\Secretaria;
use App\Repositories\SecretariasRepository;

class SecretariasService
{
    public function __construct(private readonly SecretariasRepository $secretariasRepository) {}

    public function create(array $data): Secretaria
    {
        return $this->secretariasRepository->create($data);
    }

    public function update(int $id, array $data): Secretaria
    {
        $secretaria = $this->secretariasRepository->findOrFail($id);

        return $this->secretariasRepository->update($secretaria, $data);
    }

    public function delete(int $id): void
    {
        $secretaria = $this->secretariasRepository->findOrFail($id);
        $this->secretariasRepository->delete($secretaria);
    }
}
