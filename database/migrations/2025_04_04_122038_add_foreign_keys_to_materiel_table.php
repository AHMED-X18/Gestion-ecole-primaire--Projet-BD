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
        Schema::table('materiel', function (Blueprint $table) {
            $table->foreign(['id_entretien'], 'materiel_ibfk_1')->references(['id_entretien'])->on('entretien')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materiel', function (Blueprint $table) {
            $table->dropForeign('materiel_ibfk_1');
        });
    }
};
