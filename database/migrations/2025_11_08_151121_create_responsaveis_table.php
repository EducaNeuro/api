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
            $table->string('nome', 255)->nullable();
            $table->foreignId('aluno_id')
                ->nullable()
                ->constrained('alunos')
                ->cascadeOnDelete();
            $table->string('nivel_parental', 100)->nullable();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('senha', 255)->nullable();
            $table->timestamps();

            $table->index('aluno_id');
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
