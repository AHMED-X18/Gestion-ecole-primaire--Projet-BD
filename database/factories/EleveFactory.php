<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
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
            'nom' => fake()->text(),
            'prénom' => fake()->text(),
            'date_naissance' => $this->faker->date(),
            'lieu_naissance' => fake()->text(),
            'sexe' => fake()->text(),
            'nom_tuteur' => fake()->text(),
            'tel1_tuteur' => fake()->text(),
            'tel2_tuteur' => fake()->text(),
            'statut' => fake()->text(),
            'addresse' => fake()->address(),
            'email_tuteur' => fake()->safeEmail(),
            'id_classe' => fake()->text(),
            'profil' => fake()->text(),
        ];
    }
}
