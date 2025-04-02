<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier_inscription>
 */
class Dossier_inscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_inscription' => fake()->text(),
            'somme_initiale' => fake()->text(),
            'somme_payee' => fake()->text(),
            'reste' => fake()->text(),
            'etat' => fake()->text(),
            'matricule' => fake()->text(),
            'id_admin' => fake()->text(),
        ];
    }
}
