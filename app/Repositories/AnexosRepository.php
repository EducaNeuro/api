<?php
namespace App\Repositories;

use App\Models\Anexo;

class AnexosRepository
{
    public function all()
    {
        return Anexo::all();
    }

    public function create(array $data): Anexo
    {
        return Anexo::create($data);
    }

    public function findOrFail(int $id): Anexo
    {
        return Anexo::findOrFail($id);
    }

    public function update(Anexo $anexo, array $data): Anexo
    {
        $anexo->fill($data);
        $anexo->save();

        return $anexo;
    }

    public function delete(Anexo $anexo): void
    {
        $anexo->delete();
    }
}
