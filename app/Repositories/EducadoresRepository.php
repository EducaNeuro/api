<?php
namespace App\Repositories;

use App\Models\Educador;

class EducadoresRepository
{
    public function all(?int $escolaId = null)
    {
        return Educador::when(
            $escolaId,
            fn ($query, $id) => $query->where('escola_id', $id)
        )->get();
    }

    public function create(array $data): Educador
    {
        return Educador::create($data);
    }

    public function findOrFail(int $id, ?int $escolaId = null): Educador
    {
        return Educador::when(
            $escolaId,
            fn ($query, $id) => $query->where('escola_id', $id)
        )->findOrFail($id);
    }

    public function update(Educador $educador, array $data): Educador
    {
        $educador->fill($data);
        $educador->save();

        return $educador;
    }

    public function delete(Educador $educador): void
    {
        $educador->delete();
    }

    public function count(): int
    {
        return Educador::count();
    }
}
