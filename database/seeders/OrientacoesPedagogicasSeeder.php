<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\OrientacaoPedagogica;
use Illuminate\Database\Seeder;

class OrientacoesPedagogicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            OrientacaoPedagogica::updateOrCreate(
                ['aluno_id' => $aluno->id],
                [
                    'estimulos_recomendados' => 'Atividades com estímulos visuais e táteis combinados.',
                    'recursos_recomendados' => 'Quadros de rotina, agendas visuais e materiais concretos.',
                    'estrategias_pedagogicas' => 'Ensino estruturado com passos curtos e objetivos claros.',
                    'recursos_didaticos' => 'Jogos pedagógicos, letras móveis e tablets educativos.',
                    'procedimentos_intervencao' => 'Intervenções curtas com reforço positivo imediato.',
                    'adaptacoes_curriculares' => 'Redução de volume de atividades e avaliações adaptadas.',
                    'avaliacao_adaptada' => 'Tempo estendido e uso de perguntas objetivas.',
                    'tempo_adicional' => 'Até 30 minutos extras por avaliação.',
                    'apoio_tecnologico' => 'Uso de aplicativos de comunicação alternativa.',
                    'outras_orientacoes' => 'Envolver a família no acompanhamento das metas semanais.',
                ]
            );
        }
    }
}
