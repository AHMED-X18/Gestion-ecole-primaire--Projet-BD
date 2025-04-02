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
        Schema::create('dossier_inscription', function (Blueprint $table) {
            $table->string('id_inscription', 20)->primary();
            $table->integer('somme_initiale')->nullable();
            $table->integer('somme_payee')->nullable();
            $table->integer('reste')->nullable();
            $table->string('etat', 20)->nullable();
            $table->string('matricule', 20)->nullable()->index('matricule');
            $table->string('id_admin', 20)->nullable()->index('id_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_inscription');
    }
};
