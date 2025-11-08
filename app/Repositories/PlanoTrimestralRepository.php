<?php
namespace App\Repositories;

use App\Models\PlanoTrimestral;

class PlanoTrimestralRepository
{
    public function all()
    {
        return PlanoTrimestral::with('planejamento')->get();
    }

    public function create(array $data): PlanoTrimestral
    {
        return PlanoTrimestral::create($data);
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
