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
        Schema::create('habilidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('aluno_id')
                ->nullable()
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('autonomia_pessoal')->nullable();
            $table->text('socializacao')->nullable();
            $table->text('motricidade')->nullable();
            $table->text('comunicacao')->nullable();
            $table->text('desenvolvimento_cognitivo')->nullable();
            $table->text('aspectos_comportamentais')->nullable();
            $table->timestamps();

            $table->index('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades');
    }
};
