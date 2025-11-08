<?php
namespace App\Repositories;

use App\Models\Secretaria;

class SecretariasRepository
{
    public function all()
    {
        return Secretaria::all();
    }

    public function create(array $data): Secretaria
    {
        return Secretaria::create($data);
    }

    public function findOrFail(int $id): Secretaria
    {
        return Secretaria::findOrFail($id);
    }

    public function update(Secretaria $secretaria, array $data): Secretaria
    {
        $secretaria->fill($data);
        $secretaria->save();

        return $secretaria;
    }

    public function delete(Secretaria $secretaria): void
    {
        $secretaria->delete();
    }
}
