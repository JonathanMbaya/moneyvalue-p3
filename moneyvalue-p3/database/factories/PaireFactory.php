<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\paire>
 */
class PaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $table->id();
        $table->string('source_currency')->foreign_key('code');
        $table->string('target_currency')->foreign_key('code');
        $table->decimal('rate');
        $table->timestamps('updatedAt');
        $table->integer('number_of_requests');

        return [
            //
            'source_currency' => $this -> foreign_key('code'),
            'target_currency' => $this -> foreign_key('code'),
            'rate' => $this -> faker -> randomFloat($min= 0 , $max = 10),
            'updatedAt' => $this -> faker -> dateTimeThisDecade(),
            'integer' => $this -> faker -> numberBetween($min = 50, $max = 200)
        ];
    }
}
