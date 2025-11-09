<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Anexo;
use App\Models\RegistroPedagogico;
use Illuminate\Database\Seeder;

class RegistrosPedagogicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        $anexo = Anexo::first() ?? Anexo::create([
            'url' => 'https://example.com/anexos/registro-default.pdf',
            'observacao' => 'Gerado automaticamente para registros pedagógicos.',
        ]);

        foreach ($alunos as $aluno) {
            RegistroPedagogico::updateOrCreate(
                [
                    'aluno_id' => $aluno->id,
                    'data_avaliacao' => now()->subWeeks(1)->startOfDay(),
                ],
                [
                    'registro_desenvolvimento' => 'Evolução constante na execução das atividades propostas.',
                    'observacoes_pedagogicas' => 'Preferência por atividades com apoio visual.',
                    'progresso_observado' => 'Melhora na atenção sustentada por até 20 minutos.',
                    'dificuldades_encontradas' => 'Resistência em atividades de escrita prolongadas.',
                    'estrategias_utilizadas' => 'Intervalos programados e uso de materiais sensoriais.',
                    'resultados_obtidos' => 'Participação mais ativa em rodas de conversa.',
                    'proximos_passos' => 'Introduzir atividades de escrita guiada com pistas visuais.',
                    'anexo_id' => $anexo->id,
                    'proxima_avaliacao' => now()->addWeeks(3)->startOfDay(),
                    'observacao_avaliacao' => 'Agendada avaliação conjunta com a família.',
                    'participacao_familia' => 'Família acompanha registros através de agenda digital.',
                    'orientacao_familia' => 'Reforçar em casa o uso das rotinas visuais.',
                ]
            );
        }
    }
}
