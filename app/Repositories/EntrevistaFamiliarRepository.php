<?php
namespace App\Repositories;

use App\Models\EntrevistaFamiliar;

class EntrevistaFamiliarRepository
{
    public function create(array $data): EntrevistaFamiliar
    {
        return EntrevistaFamiliar::create($data);
    }

    public function findOrFail(int $id): EntrevistaFamiliar
    {
        return EntrevistaFamiliar::findOrFail($id);
    }

    public function update(EntrevistaFamiliar $entrevistaFamiliar, array $data): EntrevistaFamiliar
    {
        $entrevistaFamiliar->fill($data);
        $entrevistaFamiliar->save();

        return $entrevistaFamiliar;
    }

    public function delete(EntrevistaFamiliar $entrevistaFamiliar): void
    {
        $entrevistaFamiliar->delete();
    }

    public function count(): int
    {
        return EntrevistaFamiliar::count();
    }
}
