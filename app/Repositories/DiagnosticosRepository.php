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
}
