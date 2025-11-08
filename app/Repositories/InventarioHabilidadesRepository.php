<?php
namespace App\Repositories;

use App\Models\InventarioHabilidade;

class InventarioHabilidadesRepository
{
    public function create(array $data): InventarioHabilidade
    {
        return InventarioHabilidade::create($data);
    }
}
