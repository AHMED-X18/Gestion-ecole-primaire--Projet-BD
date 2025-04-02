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
        Schema::create('eleve', function (Blueprint $table) {
            $table->string('matricule', 20)->primary();
            $table->string('nom', 20)->nullable();
            $table->string('prénom', 20)->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('sexe', 10)->nullable();
            $table->string('nom_tuteur', 40)->nullable();
            $table->integer('tel1_tuteur')->nullable();
            $table->integer('tel2_tuteur')->nullable();
            $table->string('statut', 20)->nullable();
            $table->string('addresse', 40)->nullable();
            $table->string('email_tuteur', 20)->nullable();
            $table->string('id_classe', 20)->nullable()->index('id_classe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleve');
    }
};
