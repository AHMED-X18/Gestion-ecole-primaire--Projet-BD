<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier_examen>
 */
class Dossier_examenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_examen' => fake()->text(),
            'nom_exam' => fake()->text(),
            'etat' => fake()->text(),
            'date_depot' => $this->faker->date(),
            'matricule' => fake()->text(),
            'id_admin' => fake()->text(),
        ];
    }
}
