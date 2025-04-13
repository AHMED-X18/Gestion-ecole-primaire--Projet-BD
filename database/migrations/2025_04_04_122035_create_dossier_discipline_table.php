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
        Schema::create('dossier_discipline', function (Blueprint $table) {
            $table->string('id_discipline', 20)->primary();
            $table->text('convocation')->nullable();
            $table->string('etat', 30)->nullable();
            $table->string('sanction', 40)->nullable();
            $table->string('matricule', 20)->nullable()->index('matricule');
            $table->string('id_admin', 20)->nullable()->index('id_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_discipline');
    }
};
