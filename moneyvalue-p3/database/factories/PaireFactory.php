<?php

namespace Database\Factories;

use App\Models\Paire; // Assurez-vous d'importer le modèle correctement
use Illuminate\Database\Eloquent\Factories\Factory;

class PaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'source_currency' => foreign_key('code'), // Utilisez randomElement pour choisir une devise aléatoire
            'target_currency' => foreign_key('code'),
            'rate' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10), // Utilisez randomFloat pour un nombre à virgule flottante
            'number_of_requests' => $this->faker->numberBetween($min = 50, $max = 200)
        ];
    }
}
