<?php
namespace App\Repositories;

use App\Models\OrientacaoPedagogica;

class OrientacoesPedagogicasRepository
{
    public function all()
    {
        return OrientacaoPedagogica::all();
    }

    public function create(array $data): OrientacaoPedagogica
    {
        return OrientacaoPedagogica::create($data);
    }

    public function findOrFail(int $id): OrientacaoPedagogica
    {
        return OrientacaoPedagogica::findOrFail($id);
    }

    public function update(OrientacaoPedagogica $orientacaoPedagogica, array $data): OrientacaoPedagogica
    {
        $orientacaoPedagogica->fill($data);
        $orientacaoPedagogica->save();

        return $orientacaoPedagogica;
    }

    public function delete(OrientacaoPedagogica $orientacaoPedagogica): void
    {
        $orientacaoPedagogica->delete();
    }

    public function count(): int
    {
        return OrientacaoPedagogica::count();
    }
}
