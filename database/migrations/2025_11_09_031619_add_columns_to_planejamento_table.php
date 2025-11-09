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
        Schema::table('planejamento', function (Blueprint $table) {
            $table->date('prazo')->nullable();
            $table->string('indicador_sucesso', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planejamento', function (Blueprint $table) {
            $table->dropColumn('prazo');
            $table->dropColumn('indicador_sucesso');
        });
    }
};
