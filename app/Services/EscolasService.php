<?php

namespace App\Services;

use App\Models\Escola;
use App\Repositories\EscolasRepository;
use Illuminate\Support\Facades\Hash;

class EscolasService
{
    public function __construct(private readonly EscolasRepository $escolasRepository) {}

    public function all()
    {
        return $this->escolasRepository->all();
    }

    public function create(array $data): Escola
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->escolasRepository->create($data);
    }

    public function find(int $id): Escola
    {
        return $this->escolasRepository->findOrFail($id);
    }

    public function update(int $id, array $data): Escola
    {
        $escola = $this->escolasRepository->findOrFail($id);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->escolasRepository->update($escola, $data);
    }

    public function delete(int $id): void
    {
        $escola = $this->escolasRepository->findOrFail($id);
        $this->escolasRepository->delete($escola);
    }

    public function getWithStatistics(?int $secretariaId = null): array
    {
        return $this->escolasRepository->getWithStatistics($secretariaId);
    }
}
