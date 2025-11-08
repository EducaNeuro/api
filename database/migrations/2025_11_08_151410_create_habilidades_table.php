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
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->text('autonomia_pessoal');
            $table->text('socializacao');
            $table->text('motricidade');
            $table->text('comunicacao');
            $table->text('desenvolvimento_cognitivo');
            $table->text('aspectos_comportamentais');
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
