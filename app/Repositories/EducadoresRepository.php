<?php
namespace App\Repositories;

use App\Models\Educador;

class EducadoresRepository
{
    public function create(array $data): Educador
    {
        return Educador::create($data);
    }

    public function findOrFail(int $id): Educador
    {
        return Educador::findOrFail($id);
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
}
