<?php

namespace Database\Seeders;

use App\Models\Anexo;
use Illuminate\Database\Seeder;

class AnexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anexos = [
            [
                'url' => 'https://example.com/anexos/relatorio-avaliacao.pdf',
                'observacao' => 'Relatório completo de avaliação interdisciplinar.',
            ],
            [
                'url' => 'https://example.com/anexos/plano-intervencao.docx',
                'observacao' => 'Plano de intervenção personalizado.',
            ],
            [
                'url' => 'https://example.com/anexos/ficha-observacao.xlsx',
                'observacao' => 'Ficha de observação semanal.',
            ],
        ];

        foreach ($anexos as $anexo) {
            Anexo::updateOrCreate(
                ['url' => $anexo['url']],
                $anexo
            );
        }
    }
}
