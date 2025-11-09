<?php
namespace App\Repositories;

use App\Models\Escola;
use Illuminate\Support\Arr;

class EscolasRepository
{
    public function all()
    {
        return Escola::with('secretaria')->get();
    }

    public function create(array $data): Escola
    {
        $id = $data['id'] ?? null;
        $payload = Arr::except($data, ['id']);

        if (! $id) {
            return Escola::create($payload);
        }

        return Escola::updateOrCreate(['id' => $id], $payload);
    }

    public function findOrFail(int $id): Escola
    {
        return Escola::with('secretaria')->findOrFail($id);
    }

    public function update(Escola $escola, array $data): Escola
    {
        $escola->fill($data);
        $escola->save();

        return $escola;
    }

    public function delete(Escola $escola): void
    {
        $escola->delete();
    }

    public function getWithStatistics(?int $secretariaId = null): array
    {
        $query = Escola::selectRaw('
                escolas.id,
                escolas.nome,
                escolas.email,
                escolas.secretaria_id,
                COUNT(DISTINCT alunos.id) as total_alunos,
                COUNT(DISTINCT educadores.id) as total_educadores
            ')
            ->leftJoin('alunos', 'escolas.id', '=', 'alunos.escola_id')
            ->leftJoin('educadores', 'escolas.id', '=', 'educadores.escola_id')
            ->with('secretaria');

        if ($secretariaId) {
            $query->where('escolas.secretaria_id', $secretariaId);
        }

        return $query->groupBy('escolas.id', 'escolas.nome', 'escolas.email', 'escolas.secretaria_id')
            ->orderBy('escolas.nome')
            ->get()
            ->map(function ($escola) {
                return [
                    'id' => $escola->id,
                    'nome' => $escola->nome,
                    'email' => $escola->email,
                    'secretaria_id' => $escola->secretaria_id,
                    'secretaria' => $escola->secretaria ? [
                        'id' => $escola->secretaria->id,
                        'nome' => $escola->secretaria->nome,
                    ] : null,
                    'total_alunos' => $escola->total_alunos,
                    'total_educadores' => $escola->total_educadores,
                ];
            })
            ->toArray();
    }
}
