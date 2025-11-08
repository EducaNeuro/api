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
                ->nullable()
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('adaptacoes_ambientais')->nullable();
            $table->text('organizacao_rotina')->nullable();
            $table->text('estrategias_principais')->nullable();
            $table->text('outros_recursos')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('estrategias')->nullable();
            $table->text('observacoes_gerais')->nullable();
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
