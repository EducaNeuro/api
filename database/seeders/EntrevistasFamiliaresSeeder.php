<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\EntrevistaFamiliar;
use Illuminate\Database\Seeder;

class EntrevistasFamiliaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            EntrevistaFamiliar::updateOrCreate(
                ['aluno_id' => $aluno->id],
                [
                    'gestacao_e_primeiros_meses' => 'Gestação sem intercorrências, desenvolvimento dentro do esperado.',
                    'sociabilidade' => 'Prefere brincar com adultos conhecidos e irmãos.',
                    'comportamento' => 'Apresenta resistência a mudanças de rotina.',
                    'sensibilidade_sensorial' => true,
                    'quadro_convulsivo' => false,
                    'uso_medicamento' => false,
                    'composicao_familiar' => 'Reside com pais e um irmão mais velho.',
                    'interesses_pessoais' => 'Gosta de montar blocos e ouvir músicas infantis.',
                    'esteriotipia' => 'Balança as mãos quando animado.',
                    'servicos_apoio' => 'Fonoaudiologia e terapia ocupacional duas vezes por semana.',
                ]
            );
        }
    }
}
