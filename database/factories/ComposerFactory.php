<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Composer>
 */
class ComposerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricule' => fake()->text(),
            'id_matiere' => fake()->text(),
            'note' => $this->faker->randomFloat(2, 0, 1000),
            'note_finale' => $this->faker->randomFloat(2, 0, 1000),
            'sequence' => fake()->text(),
            'date_compo' => $this->faker->date(),
        ];
    }
}
