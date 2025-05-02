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
        Schema::table('enseignant', function (Blueprint $table) {
            $table->foreign(['id_classe'], 'enseignant_ibfk_1')->references(['id_classe'])->on('classe')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enseignant', function (Blueprint $table) {
            $table->dropForeign('enseignant_ibfk_1');
        });
    }
};
