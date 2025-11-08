<?php
namespace App\Repositories;

use App\Models\Escola;

class EscolasRepository
{
    public function all()
    {
        return Escola::with('secretaria')->get();
    }

    public function create(array $data): Escola
    {
        return Escola::create($data);
    }

    public function findOrFail(int $id): Escola
    {
        return Escola::with('secretaria')->findOrFail($id);
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
