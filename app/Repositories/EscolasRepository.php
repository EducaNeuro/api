<?php
namespace App\Repositories;

use App\Models\Escola;

class EscolasRepository
{
    public function create(array $data): Escola
    {
        return Escola::create($data);
    }

    public function findOrFail(int $id): Escola
    {
        return Escola::findOrFail($id);
    }

    public function update(Escola $escola, array $data): Escola
    {
        $escola->fill($data);
        $escola->save();

        return $escola;
    }

    public function delete(Escola $escola): void
    {
        $escola->delete();
    }
}
