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
        Schema::create('aluno_anexo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->cascadeOnDelete();
            $table->foreignId('anexo_id')->constrained('anexos')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['aluno_id', 'anexo_id']);
            $table->index('aluno_id');
            $table->index('anexo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_anexo');
    }
};
