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
        Schema::create('entretien', function (Blueprint $table) {
            $table->string('id_entretien', 20)->primary();
            $table->string('nom', 20)->nullable();
            $table->string('prénom', 20)->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('sexe', 10)->nullable();
            $table->integer('tel1')->nullable();
            $table->integer('tel2')->nullable();
            $table->string('statut', 20)->nullable();
            $table->string('addresse', 40)->nullable();
            $table->date('date_service')->nullable();
            $table->string('lieu_service', 30)->nullable();
            $table->string('email', 20)->nullable();
            $table->binary('profil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretien');
    }
};
