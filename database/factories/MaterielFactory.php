<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materiel>
 */
class MaterielFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_materiel' => fake()->text(),
            'nom' => fake()->text(),
            'quantite' => fake()->text(),
            'etat' => fake()->text(),
            'id_entretien' => fake()->text(),
        ];
    }
}
