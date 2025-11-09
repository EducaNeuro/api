<?php
namespace App\Repositories;

use App\Models\Responsavel;
use Illuminate\Support\Arr;

class ResponsaveisRepository
{
    public function all()
    {
        return Responsavel::with('aluno')->get();
    }

    public function create(array $data): Responsavel
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Responsavel::create($payload);
        }

        return Responsavel::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): Responsavel
    {
        return Responsavel::with('aluno')->findOrFail($id);
    }

    public function update(Responsavel $responsavel, array $data): Responsavel
    {
        $responsavel->fill($data);
        $responsavel->save();

        return $responsavel;
    }

    public function delete(Responsavel $responsavel): void
    {
        $responsavel->delete();
    }
}
