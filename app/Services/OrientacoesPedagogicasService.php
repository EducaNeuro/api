<?php

namespace App\Services;

use App\Models\OrientacaoPedagogica;
use App\Repositories\OrientacoesPedagogicasRepository;

class OrientacoesPedagogicasService
{
    public function __construct(private readonly OrientacoesPedagogicasRepository $orientacoesPedagogicasRepository) {}

    public function all()
    {
        return $this->orientacoesPedagogicasRepository->all();
    }

    public function create(array $data): OrientacaoPedagogica
    {
        return $this->orientacoesPedagogicasRepository->create($data);
    }

    public function find(int $id): OrientacaoPedagogica
    {
        return $this->orientacoesPedagogicasRepository->findOrFail($id);
    }

    public function update(int $id, array $data): OrientacaoPedagogica
    {
        $orientacao = $this->orientacoesPedagogicasRepository->findOrFail($id);

        return $this->orientacoesPedagogicasRepository->update($orientacao, $data);
    }

    public function delete(int $id): void
    {
        $orientacao = $this->orientacoesPedagogicasRepository->findOrFail($id);
        $this->orientacoesPedagogicasRepository->delete($orientacao);
    }
}
