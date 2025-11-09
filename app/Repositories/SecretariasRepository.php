<?php
namespace App\Repositories;

use App\Models\Secretaria;
use Illuminate\Support\Arr;

class SecretariasRepository
{
    public function all()
    {
        return Secretaria::all();
    }

    public function create(array $data): Secretaria
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Secretaria::create($payload);
        }

        return Secretaria::updateOrCreate(['id' => $id], $payload);
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
