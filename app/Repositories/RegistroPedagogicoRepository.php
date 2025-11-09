<?php
namespace App\Repositories;

use App\Models\RegistroPedagogico;
use Illuminate\Support\Arr;

class RegistroPedagogicoRepository
{
    public function all()
    {
        return RegistroPedagogico::with(['aluno', 'anexo'])->get();
    }

    public function findByAlunoId(int $alunoId): ?RegistroPedagogico
    {
        return RegistroPedagogico::with(['anexo'])->where('aluno_id', $alunoId)->first();
    }

    public function create(array $data): RegistroPedagogico
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return RegistroPedagogico::create($payload);
        }

        return RegistroPedagogico::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): RegistroPedagogico
    {
        return RegistroPedagogico::with(['aluno', 'anexo'])->findOrFail($id);
    }

    public function update(RegistroPedagogico $registroPedagogico, array $data): RegistroPedagogico
    {
        $registroPedagogico->fill($data);
        $registroPedagogico->save();

        return $registroPedagogico;
    }

    public function delete(RegistroPedagogico $registroPedagogico): void
    {
        $registroPedagogico->delete();
    }

    public function count(): int
    {
        return RegistroPedagogico::count();
    }
}
