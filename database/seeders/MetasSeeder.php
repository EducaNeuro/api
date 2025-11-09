<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Meta;
use Illuminate\Database\Seeder;

class MetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            $metas = [
                [
                    'descricao_meta' => "Ampliar a autonomia de {$aluno->nome} nas rotinas escolares.",
                    'indicador_sucesso' => 'Realiza as etapas sozinho em 80% das tentativas.',
                    'prazo' => now()->addMonths(1),
                    'observacoes_gerais' => 'Utilizar reforços positivos ao final de cada rotina.',
                ],
                [
                    'descricao_meta' => "Evoluir a comunicação funcional de {$aluno->nome}.",
                    'indicador_sucesso' => 'Expressa necessidades com frases curtas diariamente.',
                    'prazo' => now()->addMonths(3),
                    'observacoes_gerais' => 'Registrar exemplos no caderno de comunicação.',
                ],
            ];

            foreach ($metas as $meta) {
                Meta::updateOrCreate(
                    [
                        'aluno_id' => $aluno->id,
                        'descricao_meta' => $meta['descricao_meta'],
                    ],
                    array_merge($meta, ['aluno_id' => $aluno->id])
                );
            }
        }
    }
}
