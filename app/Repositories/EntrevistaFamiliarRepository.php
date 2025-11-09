<?php
namespace App\Repositories;

use App\Models\EntrevistaFamiliar;
use Illuminate\Support\Arr;

class EntrevistaFamiliarRepository
{
    public function create(array $data): EntrevistaFamiliar
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return EntrevistaFamiliar::create($payload);
        }

        return EntrevistaFamiliar::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): EntrevistaFamiliar
    {
        return EntrevistaFamiliar::findOrFail($id);
    }

    public function update(EntrevistaFamiliar $entrevistaFamiliar, array $data): EntrevistaFamiliar
    {
        $entrevistaFamiliar->fill($data);
        $entrevistaFamiliar->save();

        return $entrevistaFamiliar;
    }

    public function delete(EntrevistaFamiliar $entrevistaFamiliar): void
    {
        $entrevistaFamiliar->delete();
    }

    public function count(): int
    {
        return EntrevistaFamiliar::count();
    }

    public function findByAlunoId(int $alunoId): ?EntrevistaFamiliar
    {
        return EntrevistaFamiliar::where('aluno_id', $alunoId)->first();
    }
}
