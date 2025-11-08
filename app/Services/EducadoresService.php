<?php

namespace App\Services;

use App\Models\Educador;
use App\Repositories\EducadoresRepository;
use Illuminate\Support\Facades\Hash;

class EducadoresService
{
    public function __construct(private readonly EducadoresRepository $educadoresRepository) {}

    public function create(array $data): Educador
    {
        $data['senha'] = Hash::make($data['senha']);

        return $this->educadoresRepository->create($data);
    }

    public function update(int $id, array $data): Educador
    {
        $educador = $this->educadoresRepository->findOrFail($id);

        if (array_key_exists('senha', $data)) {
            $data['senha'] = Hash::make($data['senha']);
        }

        return $this->educadoresRepository->update($educador, $data);
    }

    public function delete(int $id): void
    {
        $educador = $this->educadoresRepository->findOrFail($id);
        $this->educadoresRepository->delete($educador);
    }
}
