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
        Schema::create('planejamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('adaptacoes_ambientais');
            $table->text('organizacao_rotina');
            $table->text('estrategias_principais');
            $table->text('outros_recursos');
            $table->text('objetivos');
            $table->text('estrategias');
            $table->text('observacoes_gerais');
            $table->timestamps();

            $table->index('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planejamento');
    }
};
