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
        Schema::table('enseigner', function (Blueprint $table) {
            $table->foreign(['id_matiere'], 'enseigner_ibfk_1')->references(['id_matiere'])->on('matiere')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_maitre'], 'enseigner_ibfk_2')->references(['id_maitre'])->on('enseignant')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enseigner', function (Blueprint $table) {
            $table->dropForeign('enseigner_ibfk_1');
            $table->dropForeign('enseigner_ibfk_2');
        });
    }
};
