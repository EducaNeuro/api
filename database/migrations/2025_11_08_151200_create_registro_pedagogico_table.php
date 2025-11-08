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
            $table->text('registro_desenvolvimento')->nullable();
            $table->text('observacoes_pedagogicas')->nullable();
            $table->text('progresso_observado')->nullable();
            $table->text('dificuldades_encontradas')->nullable();
            $table->text('estrategias_utilizadas')->nullable();
            $table->text('resultados_obtidos')->nullable();
            $table->text('proximos_passos')->nullable();
            $table->foreignId('anexo_id')->nullable()->constrained('anexos');
            $table->date('data_avaliacao')->nullable();
            $table->date('proxima_avaliacao')->nullable();
            $table->text('observacao_avaliacao')->nullable();
            $table->text('participacao_familia')->nullable();
            $table->text('orientacao_familia')->nullable();
            $table->foreignId('aluno_id')
                ->nullable()
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
