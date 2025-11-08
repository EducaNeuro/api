<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventario_habilidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();

            $table->string('coordenacao_motora_grossa', 255);
            $table->string('coordenacao_motora_fina', 255);
            $table->string('equilibrio', 255);
            $table->string('lateralidade', 255);
            $table->string('orientacao_espacial', 255);
            $table->string('esquema_corporal', 255);
            $table->string('percepcao_visual', 255);
            $table->string('percepcao_auditiva', 255);
            $table->string('percepcao_tatil', 255);
            $table->string('integracao_sensorial', 255);
            $table->string('processamento_sensorial', 255);
            $table->string('discriminacao_sensorial', 255);

            $table->string('interacao_pares', 255);
            $table->string('interacao_adultos', 255);
            $table->string('participacao_grupos', 255);
            $table->string('cooperacao', 255);
            $table->string('empatia', 255);
            $table->string('resolucao_conflitos', 255);
            $table->string('autoregulacao', 255);
            $table->string('atencao_concentracao', 255);
            $table->string('segmento_regras', 255);
            $table->string('flexibilidade', 255);
            $table->string('controle_impulsos', 255);
            $table->string('tolerancia_frustacao', 255);

            $table->string('compreensao_verbal', 255);
            $table->string('expressao_verbal', 255);
            $table->string('comunicacao_nao_verbal', 255);
            $table->string('vocabulario', 255);
            $table->string('estrutura_linguagem', 255);
            $table->string('comunicacao_funcional', 255);

            $table->string('resolucao_problemas', 255);
            $table->string('pensamento_abstrato', 255);
            $table->string('sequenciacao', 255);
            $table->string('classificacao', 255);
            $table->string('comparacao', 255);
            $table->string('causa_efeito', 255);

            $table->string('observacoes_gerais', 255);

            $table->timestamps();

            $table->index('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_habilidades');
    }
};
