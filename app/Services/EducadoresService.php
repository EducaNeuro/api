<?php

namespace App\Services;

use App\Models\Educador;
use App\Repositories\EducadoresRepository;
use Illuminate\Support\Facades\Hash;

class EducadoresService
{
    public function __construct(private readonly EducadoresRepository $educadoresRepository) {}

    public function all()
    {
        return $this->educadoresRepository->all();
    }

    public function create(array $data): Educador
    {
        $data['password'] = Hash::make($data['password']);

        return $this->educadoresRepository->create($data);
    }

    public function find(int $id): Educador
    {
        return $this->educadoresRepository->findOrFail($id);
    }

    public function update(int $id, array $data): Educador
    {
        $educador = $this->educadoresRepository->findOrFail($id);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->educadoresRepository->update($educador, $data);
    }

    public function delete(int $id): void
    {
        $educador = $this->educadoresRepository->findOrFail($id);
        $this->educadoresRepository->delete($educador);
    }
}
