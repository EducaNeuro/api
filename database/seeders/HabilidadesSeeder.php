<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Habilidade;
use Illuminate\Database\Seeder;

class HabilidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            Habilidade::updateOrCreate(
                ['aluno_id' => $aluno->id],
                [
                    'autonomia_pessoal' => 'Organiza materiais com supervisão mínima.',
                    'socializacao' => 'Interage bem em grupos pequenos.',
                    'motricidade' => 'Apresenta coordenação satisfatória em atividades motoras.',
                    'comunicacao' => 'Utiliza linguagem verbal e pictográfica conforme necessário.',
                    'desenvolvimento_cognitivo' => 'Consegue resolver problemas simples com apoio visual.',
                    'aspectos_comportamentais' => 'Responde positivamente a reforços positivos.',
                ]
            );
        }
    }
}
