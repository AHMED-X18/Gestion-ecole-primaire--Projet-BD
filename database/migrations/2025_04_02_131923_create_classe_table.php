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
        Schema::create('classe', function (Blueprint $table) {
            $table->string('id_classe', 20)->primary();
            $table->string('nom', 20)->nullable();
            $table->string('niveau', 20)->nullable();
            $table->integer('effectif')->nullable();
            $table->string('section', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe');
    }
};
