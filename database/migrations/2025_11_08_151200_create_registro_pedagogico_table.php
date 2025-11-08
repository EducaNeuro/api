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
        Schema::create('registro_pedagogico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('registro_desenvolvimento');
            $table->text('observacoes_pedagogicas');
            $table->text('progresso_observado');
            $table->text('dificuldades_encontradas');
            $table->text('estrategias_utilizadas');
            $table->text('resultados_obtidos');
            $table->text('proximos_passos');
            $table->foreignId('anexo_id')->constrained('anexos');
            $table->date('data_avaliacao');
            $table->date('proxima_avaliacao');
            $table->text('observacao_avaliacao');
            $table->text('participacao_familia');
            $table->text('orientacao_familia');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->index('aluno_id');
            $table->index('anexo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_pedagogico');
    }
};
