<?php
namespace App\Repositories;

use App\Models\Meta;

class MetasRepository
{
    public function all()
    {
        return Meta::all();
    }

    public function create(array $data): Meta
    {
        return Meta::create($data);
    }

    public function findOrFail(int $id): Meta
    {
        return Meta::findOrFail($id);
    }

    public function update(Meta $meta, array $data): Meta
    {
        $meta->fill($data);
        $meta->save();

        return $meta;
    }

    public function delete(Meta $meta): void
    {
        $meta->delete();
    }
}
