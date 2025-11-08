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
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->smallInteger('idade')->nullable();
            $table->string('escolaridade', 255);
            $table->string('turno', 50);
            $table->string('turma', 50);
            $table->foreignId('escola_id')->constrained('escolas');
            $table->timestamps();

            $table->index('escola_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
