<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id_admin', 20)->primary();
            $table->string('nom', 255);
            $table->string('prénom', 255)->nullable();
            $table->date('date_naissance');
            $table->string('sexe', 10);
            $table->integer('tel1');
            $table->integer('tel2')->nullable();
            $table->string('statut', 255);
            $table->string('addresse', 255);
            $table->date('date_service');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->binary('profil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
