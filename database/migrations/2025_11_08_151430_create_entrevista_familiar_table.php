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
        Schema::create('entrevista_familiar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('gestacao_e_primeiros_meses');
            $table->text('sociabilidade');
            $table->text('comportamento');
            $table->boolean('sensibilidade_sensorial');
            $table->boolean('quadro_convulsivo');
            $table->boolean('uso_medicamento');
            $table->text('composicao_familiar');
            $table->text('interesses_pessoais');
            $table->text('esteriotipia');
            $table->string('servicos_apoio', 255)->nullable();
            $table->timestamps();

            $table->index('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrevista_familiar');
    }
};
