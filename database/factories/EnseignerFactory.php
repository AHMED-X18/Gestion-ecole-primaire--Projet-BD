<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enseigner>
 */
class EnseignerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_matiere' => fake()->text(),
            'id_maitre' => fake()->text(),
            'date_cours' => $this->faker->date(),
        ];
    }
}
