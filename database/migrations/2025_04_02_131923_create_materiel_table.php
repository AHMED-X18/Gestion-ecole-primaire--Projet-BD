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
        Schema::create('materiel', function (Blueprint $table) {
            $table->string('id_materiel', 20)->primary();
            $table->string('nom', 30)->nullable();
            $table->integer('quantite')->nullable();
            $table->string('etat', 30)->nullable();
            $table->string('id_entretien', 20)->nullable()->index('id_entretien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel');
    }
};
