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
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->foreignId('nivel_parental_id')
                ->constrained('niveis_parentais');
            $table->string('cpf', 14)->unique();
            $table->string('senha', 255);
            $table->timestamps();

            $table->index('aluno_id');
            $table->index('nivel_parental_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsaveis');
    }
};
