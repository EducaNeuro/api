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
        Schema::create('orientacoes_pedagogicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('estimulos_recomendados')->nullable();
            $table->text('recursos_recomendados')->nullable();
            $table->text('estrategias_pedagogicas')->nullable();
            $table->text('recursos_didaticos')->nullable();
            $table->text('procedimentos_intervencao')->nullable();
            $table->text('adaptacoes_curriculares')->nullable();
            $table->text('avaliacao_adaptada')->nullable();
            $table->string('tempo_adicional', 255)->nullable();
            $table->string('apoio_tecnologico', 255)->nullable();
            $table->text('outras_orientacoes')->nullable();
            $table->timestamps();

            $table->index('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orientacoes_pedagogicas');
    }
};
