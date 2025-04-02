<?php

namespace Database\Seeders;

use Database\Factories\EleveFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seeder_eleve extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        EleveFactory::factory()->count(10)->create();
    }
}
