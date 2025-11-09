<?php
namespace App\Repositories;

use App\Models\PlanoTrimestral;
use Illuminate\Support\Arr;

class PlanoTrimestralRepository
{
    public function all()
    {
        return PlanoTrimestral::with('planejamento')->get();
    }

    public function findByAlunoId(int $alunoId): ?PlanoTrimestral
    {
        return PlanoTrimestral::with('planejamento')->where('aluno_id', $alunoId)->first();
    }

    public function create(array $data): PlanoTrimestral
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return PlanoTrimestral::create($payload);
        }

        return PlanoTrimestral::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): PlanoTrimestral
    {
        return PlanoTrimestral::with('planejamento')->findOrFail($id);
    }

    public function update(PlanoTrimestral $planoTrimestral, array $data): PlanoTrimestral
    {
        $planoTrimestral->fill($data);
        $planoTrimestral->save();

        return $planoTrimestral;
    }

    public function delete(PlanoTrimestral $planoTrimestral): void
    {
        $planoTrimestral->delete();
    }
}
