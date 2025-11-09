<?php
namespace App\Repositories;

use App\Models\Diagnostico;

class DiagnosticosRepository
{
    public function all()
    {
        return Diagnostico::with('aluno')->get();
    }

    public function create(array $data): Diagnostico
    {
        return Diagnostico::create($data);
    }

    public function findOrFail(int $id): Diagnostico
    {
        return Diagnostico::with('aluno')->findOrFail($id);
    }

    public function update(Diagnostico $diagnostico, array $data): Diagnostico
    {
        $diagnostico->fill($data);
        $diagnostico->save();

        return $diagnostico;
    }

    public function delete(Diagnostico $diagnostico): void
    {
        $diagnostico->delete();
    }

    public function getRanking(?int $escolaId = null): array
    {
        $query = Diagnostico::selectRaw('diagnosticos.nome, COUNT(*) as total')
            ->join('alunos', 'diagnosticos.aluno_id', '=', 'alunos.id');

        if ($escolaId) {
            $query->where('alunos.escola_id', $escolaId);
        }

        return $query->groupBy('diagnosticos.nome')
            ->orderByDesc('total')
            ->get()
            ->map(fn($item) => [
                'diagnostico' => $item->nome,
                'total_casos' => $item->total
            ])
            ->toArray();
    }
}
