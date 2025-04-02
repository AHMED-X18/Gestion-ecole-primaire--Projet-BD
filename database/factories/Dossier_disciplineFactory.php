<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier_discipline>
 */
class Dossier_disciplineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_discipline' => fake()->text(),
            'convocation' => $this->faker->paragraph(),
            'etat' => fake()->text(),
            'sanction' => fake()->text(),
            'matricule' => fake()->text(),
            'id_admin' => fake()->text(),
        ];
    }
}
