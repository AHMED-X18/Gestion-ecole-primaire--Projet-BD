<?php

namespace Database\Seeders;
use App\Models\Absence;

use Database\Factories\AbsenceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Databaseseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(Absence::class);
        /*$this->call(seeder_admin::class);
        $this->call(seeder_classe::class);
        $this->call(seeder_composer::class);
        $this->call(seeder_discipline::class);
        $this->call(seeder_eleve::class);
        $this->call(seeder_enseignant::class);
        $this->call(seeder_enseigner::class);
        $this->call(seeder_entretien::class);
        $this->call(seeder_examen::class);
        $this->call(seeder_inscription::class);
        $this->call(seeder_materiel::class);
        $this->call(seeder_matiere::class);*/
    }
}
