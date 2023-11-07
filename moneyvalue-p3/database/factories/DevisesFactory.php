<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\devises>
 */
class DevisesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $code = $this->faker->RandomElement(['EUR', 'USD', 'BTC']);

        if ($code == 'EUR'){
            $name = 'Euro';
        }
        else if ($code == 'USD') {
            $name = 'Dollar';
        }
        else {
            $name = 'Bitcoin';
        }

        return [
            //
            'code'=> $code,
            'name'=> $name
        ];
    }
}
