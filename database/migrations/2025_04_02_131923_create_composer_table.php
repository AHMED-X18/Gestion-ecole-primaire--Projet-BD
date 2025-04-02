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
        Schema::create('composer', function (Blueprint $table) {
            $table->string('matricule', 20)->nullable()->index('matricule');
            $table->string('id_matiere', 20)->nullable()->index('id_matiere');
            $table->float('note')->nullable();
            $table->float('note_finale')->nullable();
            $table->integer('sequence')->nullable();
            $table->date('date_compo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composer');
    }
};
