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
        Schema::create('plano_trimestral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('planejamento_id')
                ->constrained('planejamento')
                ->cascadeOnDelete();
            $table->text('objetivo');
            $table->text('estrategias');
            $table->timestamps();

            $table->index('planejamento_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plano_trimestral');
    }
};
