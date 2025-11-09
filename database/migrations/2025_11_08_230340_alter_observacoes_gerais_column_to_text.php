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
        Schema::table('inventario_habilidades', function (Blueprint $table) {
            $table->tinyText('observacoes_gerais')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario_habilidades', function (Blueprint $table) {
            $table->string('observacoes_gerais', 255)->nullable()->change();
        });
    }
};
