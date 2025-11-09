<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Diagnostico;
use Illuminate\Database\Seeder;

class DiagnosticosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            $diagnosticos = [
                [
                    'nome' => 'Transtorno do Espectro Autista',
                    'observacoes' => 'Avaliação realizada pela equipe multiprofissional em ' . now()->subMonths(2)->format('d/m/Y') . '.',
                ],
                [
                    'nome' => 'TDAH - Tipo combinado',
                    'observacoes' => 'Requer acompanhamento contínuo com neuropediatra.',
                ],
            ];

            foreach ($diagnosticos as $diagnostico) {
                Diagnostico::updateOrCreate(
                    [
                        'aluno_id' => $aluno->id,
                        'nome' => $diagnostico['nome'],
                    ],
                    array_merge($diagnostico, ['aluno_id' => $aluno->id])
                );
            }
        }
    }
}
