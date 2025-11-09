<?php
namespace App\Repositories;

use App\Models\Planejamento;

class PlanejamentoRepository
{
    public function all()
    {
        return Planejamento::with('aluno')->get();
    }

    public function findByAlunoId(int $alunoId): ?Planejamento
    {
        return Planejamento::with('aluno')->where('aluno_id', $alunoId)->first();
    }

    public function create(array $data): Planejamento
    {
        return Planejamento::create($data);
    }

    public function findOrFail(int $id): Planejamento
    {
        return Planejamento::with('aluno')->findOrFail($id);
    }

    public function update(Planejamento $planejamento, array $data): Planejamento
    {
        $planejamento->fill($data);
        $planejamento->save();

        return $planejamento;
    }

    public function delete(Planejamento $planejamento): void
    {
        $planejamento->delete();
    }

    public function count(): int
    {
        return Planejamento::count();
    }
}
