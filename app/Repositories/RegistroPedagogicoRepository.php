<?php
namespace App\Repositories;

use App\Models\RegistroPedagogico;

class RegistroPedagogicoRepository
{
    public function all()
    {
        return RegistroPedagogico::with(['aluno', 'anexo'])->get();
    }

    public function create(array $data): RegistroPedagogico
    {
        return RegistroPedagogico::create($data);
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
}
