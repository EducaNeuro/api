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
        Schema::table('educadores', function (Blueprint $table) {
            $table->foreignId('escola_id')
                ->nullable()
                ->after('turno')
                ->constrained('escolas')
                ->nullOnDelete();

            $table->index('escola_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educadores', function (Blueprint $table) {
            $table->dropConstrainedForeignId('escola_id');
        });
    }
};
