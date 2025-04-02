<?php

namespace Database\Factories;

use App\Models\Absence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_absence' => fake()->text(),
            'horaire' => fake()->text(),
            'jour' => $this->faker->date(),
            'matricule' => fake()->text(),
            'id_discipline' => fake()->text(),
        ];
    }
}
