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
        Schema::table('dossier_examen', function (Blueprint $table) {
            $table->foreign(['id_admin'], 'dossier_examen_ibfk_1')->references(['id_admin'])->on('admin')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['matricule'], 'dossier_examen_ibfk_2')->references(['matricule'])->on('eleve')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dossier_examen', function (Blueprint $table) {
            $table->dropForeign('dossier_examen_ibfk_1');
            $table->dropForeign('dossier_examen_ibfk_2');
        });
    }
};
