<?php

namespace App\Services;

use App\Models\RegistroPedagogico;
use App\Repositories\RegistroPedagogicoRepository;

class RegistroPedagogicoService
{
    public function __construct(private readonly RegistroPedagogicoRepository $registroPedagogicoRepository) {}

    public function all()
    {
        return $this->registroPedagogicoRepository->all();
    }

    public function findByAlunoId(int $alunoId): ?RegistroPedagogico
    {
        return $this->registroPedagogicoRepository->findByAlunoId($alunoId);
    }

    public function find(int $id): RegistroPedagogico
    {
        return $this->registroPedagogicoRepository->findOrFail($id);
    }

    public function create(array $data): RegistroPedagogico
    {
        return $this->registroPedagogicoRepository->create($data);
    }

    public function update(int $id, array $data): RegistroPedagogico
    {
        $registro = $this->registroPedagogicoRepository->findOrFail($id);

        return $this->registroPedagogicoRepository->update($registro, $data);
    }

    public function delete(int $id): void
    {
        $registro = $this->registroPedagogicoRepository->findOrFail($id);
        $this->registroPedagogicoRepository->delete($registro);
    }
}
