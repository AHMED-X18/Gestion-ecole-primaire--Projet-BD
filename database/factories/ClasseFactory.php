<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class ClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_classe' => fake()->text(),
            'nom' => fake()->text(),
            'niveau' => fake()->text(),
            'effectif' => fake()->text(),
            'section' => fake()->text(),
        ];
    }
}
