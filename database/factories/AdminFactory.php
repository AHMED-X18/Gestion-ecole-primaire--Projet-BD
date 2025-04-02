<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_admin' => fake()->text(),
            'nom' => fake()->text(),
            'prénom' => fake()->text(),
            'date_naissance' => $this->faker->date(),
            'sexe' => fake()->text(),
            'tel1' => fake()->text(),
            'tel2' => fake()->text(),
            'statut' => fake()->text(),
            'addresse' => fake()->address(),
            'date_service' => $this->faker->date(),
            'email' => fake()->safeEmail(),
            'password' => fake()->text(),
        ];
    }
}
