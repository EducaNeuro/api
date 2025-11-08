<?php
namespace App\Repositories;

use App\Models\Aluno;

class AlunosRepository
{
    public function all()
    {
        return Aluno::with(['escola', 'diagnosticos'])->get();
    }

    public function create(array $data): Aluno
    {
        return Aluno::create($data);
    }

    public function findOrFail(int $id): Aluno
    {
        return Aluno::with(['escola', 'diagnosticos'])->findOrFail($id);
    }

    public function update(Aluno $aluno, array $data): Aluno
    {
        $aluno->fill($data);
        $aluno->save();

        return $aluno;
    }

    public function delete(Aluno $aluno): void
    {
        $aluno->delete();
    }
}
