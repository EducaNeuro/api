<?php
namespace App\Repositories;

use App\Models\Anexo;
use Illuminate\Support\Arr;

class AnexosRepository
{
    public function all()
    {
        return Anexo::all();
    }

    public function create(array $data): Anexo
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Anexo::create($payload);
        }

        return Anexo::updateOrCreate(['id' => $id], $payload);
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
