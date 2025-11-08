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
                ->nullable()
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('gestacao_e_primeiros_meses')->nullable();
            $table->text('sociabilidade')->nullable();
            $table->text('comportamento')->nullable();
            $table->boolean('sensibilidade_sensorial')->nullable();
            $table->boolean('quadro_convulsivo')->nullable();
            $table->boolean('uso_medicamento')->nullable();
            $table->text('composicao_familiar')->nullable();
            $table->text('interesses_pessoais')->nullable();
            $table->text('esteriotipia')->nullable();
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
