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
        Schema::create('enseigner', function (Blueprint $table) {
            $table->string('id_matiere', 20)->nullable()->index('id_matiere');
            $table->string('id_maitre', 20)->nullable()->index('id_maitre');
            $table->date('date_cours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseigner');
    }
};
