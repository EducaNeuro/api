<?php
namespace App\Repositories;

use App\Models\OrientacaoPedagogica;
use Illuminate\Support\Arr;

class OrientacoesPedagogicasRepository
{
    public function all()
    {
        return OrientacaoPedagogica::all();
    }

    public function findByAlunoId(int $alunoId): ?OrientacaoPedagogica
    {
        return OrientacaoPedagogica::where('aluno_id', $alunoId)->first();
    }

    public function create(array $data): OrientacaoPedagogica
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return OrientacaoPedagogica::create($payload);
        }

        return OrientacaoPedagogica::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): OrientacaoPedagogica
    {
        return OrientacaoPedagogica::findOrFail($id);
    }

    public function update(OrientacaoPedagogica $orientacaoPedagogica, array $data): OrientacaoPedagogica
    {
        $orientacaoPedagogica->fill($data);
        $orientacaoPedagogica->save();

        return $orientacaoPedagogica;
    }

    public function delete(OrientacaoPedagogica $orientacaoPedagogica): void
    {
        $orientacaoPedagogica->delete();
    }

    public function count(): int
    {
        return OrientacaoPedagogica::count();
    }
}
