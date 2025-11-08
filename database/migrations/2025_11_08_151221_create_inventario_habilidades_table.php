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
                ->nullable()
                ->constrained('alunos')
                ->cascadeOnDelete();

            $table->string('coordenacao_motora_grossa', 255)->nullable();
            $table->string('coordenacao_motora_fina', 255)->nullable();
            $table->string('equilibrio', 255)->nullable();
            $table->string('lateralidade', 255)->nullable();
            $table->string('orientacao_espacial', 255)->nullable();
            $table->string('esquema_corporal', 255)->nullable();
            $table->string('percepcao_visual', 255)->nullable();
            $table->string('percepcao_auditiva', 255)->nullable();
            $table->string('percepcao_tatil', 255)->nullable();
            $table->string('integracao_sensorial', 255)->nullable();
            $table->string('processamento_sensorial', 255)->nullable();
            $table->string('discriminacao_sensorial', 255)->nullable();

            $table->string('interacao_pares', 255)->nullable();
            $table->string('interacao_adultos', 255)->nullable();
            $table->string('participacao_grupos', 255)->nullable();
            $table->string('cooperacao', 255)->nullable();
            $table->string('empatia', 255)->nullable();
            $table->string('resolucao_conflitos', 255)->nullable();
            $table->string('autoregulacao', 255)->nullable();
            $table->string('atencao_concentracao', 255)->nullable();
            $table->string('segmento_regras', 255)->nullable();
            $table->string('flexibilidade', 255)->nullable();
            $table->string('controle_impulsos', 255)->nullable();
            $table->string('tolerancia_frustacao', 255)->nullable();

            $table->string('compreensao_verbal', 255)->nullable();
            $table->string('expressao_verbal', 255)->nullable();
            $table->string('comunicacao_nao_verbal', 255)->nullable();
            $table->string('vocabulario', 255)->nullable();
            $table->string('estrutura_linguagem', 255)->nullable();
            $table->string('comunicacao_funcional', 255)->nullable();

            $table->string('resolucao_problemas', 255)->nullable();
            $table->string('pensamento_abstrato', 255)->nullable();
            $table->string('sequenciacao', 255)->nullable();
            $table->string('classificacao', 255)->nullable();
            $table->string('comparacao', 255)->nullable();
            $table->string('causa_efeito', 255)->nullable();

            $table->string('observacoes_gerais', 255)->nullable();

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
