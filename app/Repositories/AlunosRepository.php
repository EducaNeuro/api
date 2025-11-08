<?php
namespace App\Repositories;

use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class AlunosRepository
{
    public function all()
    {
        return Aluno::with(['escola', 'diagnosticos'])->get();
    }

    public function create(array $data): Aluno
    {
        return Aluno::create($data);
    }

    public function findOrFail(int $id): Aluno
    {
        return Aluno::with(['escola', 'diagnosticos'])->findOrFail($id);
    }

    public function update(Aluno $aluno, array $data): Aluno
    {
        $aluno->fill($data);
        $aluno->save();

        return $aluno;
    }

    public function delete(Aluno $aluno): void
    {
        $aluno->delete();
    }

    public function count(): int
    {
        return Aluno::count();
    }

    /**
     * Conta alunos que possuem pelo menos um registro de PDI
     */
    public function countComPdi(): int
    {
        return DB::table('alunos')
            ->where(function ($query) {
                $query->whereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('inventario_habilidades')
                        ->whereColumn('inventario_habilidades.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('habilidades')
                        ->whereColumn('habilidades.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('orientacoes_pedagogicas')
                        ->whereColumn('orientacoes_pedagogicas.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('metas')
                        ->whereColumn('metas.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('planejamento')
                        ->whereColumn('planejamento.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('registro_pedagogico')
                        ->whereColumn('registro_pedagogico.aluno_id', 'alunos.id');
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->select(DB::raw(1))
                        ->from('entrevista_familiar')
                        ->whereColumn('entrevista_familiar.aluno_id', 'alunos.id');
                });
            })
            ->count();
    }
}
