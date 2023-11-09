<?php

namespace Database\Factories;

use App\Models\Devises; // Assurez-vous d'importer le modèle correctement
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = (['EUR', 'USD', 'BTC']); // Utilisez randomElement pour choisir une devise aléatoir

        return [
            'code' => $code,
            'name'=> $name
        ];


    }
}
