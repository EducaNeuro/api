<?php

namespace App\Services;

use App\Models\Planejamento;
use App\Repositories\PlanejamentoRepository;

class PlanejamentoService
{
    public function __construct(private readonly PlanejamentoRepository $planejamentoRepository) {}

    public function all()
    {
        return $this->planejamentoRepository->all();
    }

    public function findByAlunoId(int $alunoId): ?Planejamento
    {
        return $this->planejamentoRepository->findByAlunoId($alunoId);
    }

    public function find(int $id): Planejamento
    {
        return $this->planejamentoRepository->findOrFail($id);
    }

    public function create(array $data): Planejamento
    {
        return $this->planejamentoRepository->create($data);
    }

    public function update(int $id, array $data): Planejamento
    {
        $planejamento = $this->planejamentoRepository->findOrFail($id);

        return $this->planejamentoRepository->update($planejamento, $data);
    }

    public function delete(int $id): void
    {
        $planejamento = $this->planejamentoRepository->findOrFail($id);
        $this->planejamentoRepository->delete($planejamento);
    }
}
