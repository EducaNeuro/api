<?php
namespace App\Repositories;

use App\Models\Meta;
use Illuminate\Support\Arr;

class MetasRepository
{
    public function all()
    {
        return Meta::all();
    }

    public function create(array $data): Meta
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Meta::create($payload);
        }

        return Meta::updateOrCreate(['id' => $id], $payload);
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

    public function count(): int
    {
        return Meta::count();
    }
}
