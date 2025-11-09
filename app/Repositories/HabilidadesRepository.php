<?php
namespace App\Repositories;

use App\Models\Habilidade;
use Illuminate\Support\Arr;

class HabilidadesRepository
{
    public function create(array $data): Habilidade
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Habilidade::create($payload);
        }

        return Habilidade::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): Habilidade
    {
        return Habilidade::findOrFail($id);
    }

    public function update(Habilidade $habilidade, array $data): Habilidade
    {
        $habilidade->fill($data);
        $habilidade->save();

        return $habilidade;
    }

    public function delete(Habilidade $habilidade): void
    {
        $habilidade->delete();
    }

    public function count(): int
    {
        return Habilidade::count();
    }

    public function findByAlunoId(int $alunoId): ?Habilidade
    {
        return Habilidade::where('aluno_id', $alunoId)->first();
    }
}
