<?php
namespace App\Repositories;

use App\Models\Habilidade;

class HabilidadesRepository
{
    public function create(array $data): Habilidade
    {
        return Habilidade::create($data);
    }

    public function findOrFail(int $id): Habilidade
    {
        return Habilidade::findOrFail($id);
    }

    public function update(Habilidade $habilidade, array $data): Habilidade
    {
        $habilidade->fill($data);
        $habilidade->save();

        return $habilidade;
    }

    public function delete(Habilidade $habilidade): void
    {
        $habilidade->delete();
    }

    public function count(): int
    {
        return Habilidade::count();
    }
}
