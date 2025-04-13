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
        Schema::create('dossier_examen', function (Blueprint $table) {
            $table->string('id_examen', 20)->primary();
            $table->string('nom_exam', 20)->nullable();
            $table->string('etat', 20)->nullable();
            $table->date('date_depot')->nullable();
            $table->string('matricule', 20)->nullable()->index('matricule');
            $table->string('id_admin', 20)->nullable()->index('id_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_examen');
    }
};
