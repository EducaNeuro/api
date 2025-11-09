<?php
namespace App\Repositories;

use App\Models\Escola;
use Illuminate\Support\Arr;

class EscolasRepository
{
    public function all()
    {
        return Escola::with('secretaria')->get();
    }

    public function create(array $data): Escola
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Escola::create($payload);
        }

        return Escola::updateOrCreate(['id' => $id], $payload);
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
