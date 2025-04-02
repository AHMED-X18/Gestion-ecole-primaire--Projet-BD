<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\Eleve;

class EleveFactory extends Factory
{
    protected $model = Eleve::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'matricule' => fake()->text(),
            'nom' => fake()->text(),
            'prénom' => fake()->text(),
            'date_naissance' => $this->faker->date(),
            'sexe' => fake()->text(),
            'nom_tuteur' => fake()->text(),
            'tel1_tuteur' => fake()->text(),
            'tel2_tuteur' => fake()->text(),
            'statut' => fake()->text(),
            'addresse' => fake()->address(),
            'email_tuteur' => fake()->safeEmail(),
            'id_classe' => fake()->text(),
        ];
    }
}
