<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Responsavel;
use Illuminate\Database\Seeder;

class ResponsaveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            $responsaveis = [
                [
                    'nome' => "Responsável 1 de {$aluno->nome}",
                    'nivel_parental' => 'Mãe',
                    'cpf' => str_pad((string) (10000000000 + $aluno->id), 11, '0', STR_PAD_LEFT),
                    'telefone' => '119999' . str_pad((string) $aluno->id, 4, '0', STR_PAD_LEFT),
                ],
                [
                    'nome' => "Responsável 2 de {$aluno->nome}",
                    'nivel_parental' => 'Pai',
                    'cpf' => str_pad((string) (20000000000 + $aluno->id), 11, '0', STR_PAD_LEFT),
                    'telefone' => '118888' . str_pad((string) $aluno->id, 4, '0', STR_PAD_LEFT),
                ],
            ];

            foreach ($responsaveis as $responsavel) {
                Responsavel::updateOrCreate(
                    ['cpf' => $responsavel['cpf']],
                    array_merge($responsavel, ['aluno_id' => $aluno->id])
                );
            }
        }
    }
}
