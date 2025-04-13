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
        Schema::table('composer', function (Blueprint $table) {
            $table->foreign(['id_matiere'], 'composer_ibfk_1')->references(['id_matiere'])->on('matiere')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['matricule'], 'composer_ibfk_2')->references(['matricule'])->on('eleve')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('composer', function (Blueprint $table) {
            $table->dropForeign('composer_ibfk_1');
            $table->dropForeign('composer_ibfk_2');
        });
    }
};
