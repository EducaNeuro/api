<?php
namespace App\Repositories;

use App\Models\Responsavel;

class ResponsaveisRepository
{
    public function all()
    {
        return Responsavel::with('aluno')->get();
    }

    public function create(array $data): Responsavel
    {
        return Responsavel::create($data);
    }

    public function findOrFail(int $id): Responsavel
    {
        return Responsavel::with('aluno')->findOrFail($id);
    }

    public function update(Responsavel $responsavel, array $data): Responsavel
    {
        $responsavel->fill($data);
        $responsavel->save();

        return $responsavel;
    }

    public function delete(Responsavel $responsavel): void
    {
        $responsavel->delete();
    }
}
