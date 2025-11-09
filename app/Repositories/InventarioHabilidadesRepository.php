<?php
namespace App\Repositories;

use App\Models\InventarioHabilidade;
use Illuminate\Support\Arr;

class InventarioHabilidadesRepository
{
    public function all()
    {
        return InventarioHabilidade::all();
    }

    public function create(array $data): InventarioHabilidade
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return InventarioHabilidade::create($payload);
        }

        return InventarioHabilidade::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): InventarioHabilidade
    {
        return InventarioHabilidade::findOrFail($id);
    }

    public function count(): int
    {
        return InventarioHabilidade::count();
    }

    public function findByAlunoId(int $alunoId): ?InventarioHabilidade
    {
        return InventarioHabilidade::where('aluno_id', $alunoId)->first();
    }
}
