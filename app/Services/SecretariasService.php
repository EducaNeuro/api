<?php

namespace App\Services;

use App\Models\Secretaria;
use App\Repositories\SecretariasRepository;
use Illuminate\Support\Facades\Hash;

class SecretariasService
{
    public function __construct(private readonly SecretariasRepository $secretariasRepository) {}

    public function all()
    {
        return $this->secretariasRepository->all();
    }

    public function create(array $data): Secretaria
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->secretariasRepository->create($data);
    }

    public function find(int $id): Secretaria
    {
        return $this->secretariasRepository->findOrFail($id);
    }

    public function update(int $id, array $data): Secretaria
    {
        $secretaria = $this->secretariasRepository->findOrFail($id);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->secretariasRepository->update($secretaria, $data);
    }

    public function delete(int $id): void
    {
        $secretaria = $this->secretariasRepository->findOrFail($id);
        $this->secretariasRepository->delete($secretaria);
    }
}
