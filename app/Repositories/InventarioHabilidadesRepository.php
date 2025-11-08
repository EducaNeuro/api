<?php
namespace App\Repositories;

use App\Models\InventarioHabilidade;

class InventarioHabilidadesRepository
{
    public function all()
    {
        return InventarioHabilidade::all();
    }

    public function create(array $data): InventarioHabilidade
    {
        return InventarioHabilidade::create($data);
    }

    public function findOrFail(int $id): InventarioHabilidade
    {
        return InventarioHabilidade::findOrFail($id);
    }
}
