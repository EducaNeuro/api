<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Planejamento;
use App\Models\PlanoTrimestral;
use Illuminate\Database\Seeder;

class PlanejamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            $planejamento = Planejamento::updateOrCreate(
                ['aluno_id' => $aluno->id],
                [
                    'adaptacoes_ambientais' => 'Organização visual da sala e sinalização de espaços.',
                    'organizacao_rotina' => 'Uso de agendas visuais e antecipação de mudanças.',
                    'estrategias_principais' => 'Metodologias ativas com apoio multisensorial.',
                    'outros_recursos' => 'Materiais concretos e suportes tecnológicos.',
                    'objetivos' => 'Favorecer autonomia, comunicação e participação.',
                    'estrategias' => 'Sequenciamento de tarefas, feedback imediato e reforço positivo.',
                    'observacoes_gerais' => 'Revisar quinzenalmente com a equipe multidisciplinar.',
                ]
            );

            $planos = [
                [
                    'objetivo' => '1º Trimestre - Estabelecer rotina previsível.',
                    'estrategias' => 'Quadros visuais e treino diário com educador de referência.',
                ],
                [
                    'objetivo' => '2º Trimestre - Expandir comunicação funcional.',
                    'estrategias' => 'Uso de PECS e dramatizações guiadas.',
                ],
                [
                    'objetivo' => '3º Trimestre - Participar de projetos coletivos.',
                    'estrategias' => 'Projetos colaborativos com pares mediadores.',
                ],
            ];

            foreach ($planos as $plano) {
                PlanoTrimestral::updateOrCreate(
                    [
                        'planejamento_id' => $planejamento->id,
                        'objetivo' => $plano['objetivo'],
                    ],
                    array_merge($plano, ['planejamento_id' => $planejamento->id])
                );
            }
        }
    }
}
