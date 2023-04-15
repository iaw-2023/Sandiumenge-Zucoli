<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $marcas = array(ferrari, ford, chevrolet, mazda, subaru, toyota, delorean, bentley);

        return [
            'id' => $this->faker->numberBetween(1,100),           
            'id' => $this->faker->randomLetter().$this->faker->randomNumber(5),
            'marca' => $marcas[array_rand($marcas)],
        ];
    }
}