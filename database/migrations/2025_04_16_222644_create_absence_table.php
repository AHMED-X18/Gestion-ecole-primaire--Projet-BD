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
        Schema::create('absence', function (Blueprint $table) {
            $table->string('id_absence', 20)->primary();
            $table->string('horaire', 20)->nullable();
            $table->date('jour')->nullable();
            $table->string('matricule', 20)->nullable()->index('matricule');
            $table->string('id_discipline', 20)->nullable()->index('id_discipline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence');
    }
};
