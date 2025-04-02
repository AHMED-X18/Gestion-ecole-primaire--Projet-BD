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
        Schema::table('eleve', function (Blueprint $table) {
            $table->foreign(['id_classe'], 'eleve_ibfk_1')->references(['id_classe'])->on('classe')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eleve', function (Blueprint $table) {
            $table->dropForeign('eleve_ibfk_1');
        });
    }
};
