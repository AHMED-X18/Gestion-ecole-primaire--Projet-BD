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
        Schema::table('absence', function (Blueprint $table) {
            $table->foreign(['id_discipline'], 'absence_ibfk_1')->references(['id_discipline'])->on('dossier_discipline')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['matricule'], 'absence_ibfk_2')->references(['matricule'])->on('eleve')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absence', function (Blueprint $table) {
            $table->dropForeign('absence_ibfk_1');
            $table->dropForeign('absence_ibfk_2');
        });
    }
};
