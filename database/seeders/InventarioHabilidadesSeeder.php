<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\InventarioHabilidade;
use Illuminate\Database\Seeder;

class InventarioHabilidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            InventarioHabilidade::updateOrCreate(
                ['aluno_id' => $aluno->id],
                [
                    'coordenacao_motora_grossa' => 'Adequada',
                    'coordenacao_motora_fina' => 'Em desenvolvimento',
                    'equilibrio' => 'Bom',
                    'lateralidade' => 'Definida',
                    'orientacao_espacial' => 'Boa',
                    'esquema_corporal' => 'Adequado',
                    'percepcao_visual' => 'Boa',
                    'percepcao_auditiva' => 'Boa',
                    'percepcao_tatil' => 'Adequada',
                    'integracao_sensorial' => 'Em desenvolvimento',
                    'processamento_sensorial' => 'Adequado',
                    'discriminacao_sensorial' => 'Adequada',
                    'interacao_pares' => 'Participa com incentivo',
                    'interacao_adultos' => 'Boa',
                    'participacao_grupos' => 'Ativa quando mediado',
                    'cooperacao' => 'Boa',
                    'empatia' => 'Demonstra quando orientado',
                    'resolucao_conflitos' => 'Precisa de mediação',
                    'autoregulacao' => 'Melhorando com estratégias visuais',
                    'atencao_concentracao' => 'Oscila em atividades longas',
                    'segmento_regras' => 'Segue quando reforçado',
                    'flexibilidade' => 'Resistente a mudanças repentinas',
                    'controle_impulsos' => 'Necessita supervisão',
                    'tolerancia_frustacao' => 'Melhora com antecipação',
                    'compreensao_verbal' => 'Boa',
                    'expressao_verbal' => 'Expande vocabulário diariamente',
                    'comunicacao_nao_verbal' => 'Utiliza gestos de apoio',
                    'vocabulario' => 'Adequado à idade',
                    'estrutura_linguagem' => 'Frases completas',
                    'comunicacao_funcional' => 'Expressa necessidades básicas',
                    'resolucao_problemas' => 'Precisa de pistas',
                    'pensamento_abstrato' => 'Em desenvolvimento',
                    'sequenciacao' => 'Apresenta pequenas dificuldades',
                    'classificacao' => 'Reconhece categorias simples',
                    'comparacao' => 'Faz comparações básicas',
                    'causa_efeito' => 'Entende em situações concretas',
                    'observacoes_gerais' => 'Necessita rotina estruturada para melhor desempenho.',
                ]
            );
        }
    }
}
