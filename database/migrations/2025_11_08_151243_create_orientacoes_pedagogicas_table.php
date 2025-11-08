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
            $table->text('estimulos_recomendados');
            $table->text('recursos_recomendados');
            $table->text('estrategias_pedagogicas');
            $table->text('recursos_didaticos');
            $table->text('procedimentos_intervencao');
            $table->text('adaptacoes_curriculares');
            $table->text('avaliacao_adaptada');
            $table->string('tempo_adicional', 255);
            $table->string('apoio_tecnologico', 255);
            $table->text('outras_orientacoes');
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
