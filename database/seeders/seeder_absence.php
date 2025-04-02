<?php

namespace Database\Seeders;
use App\Models\Absence;

use Database\Factories\AbsenceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seeder_absence extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Utiliser une factory pour génerer des données test
        Absence::factory()->count(10)->create();
    }
}
