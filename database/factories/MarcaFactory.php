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
        $marcas = array('Ferrari', 'Ford', 'Chevrolet', 'Mazda', 'Subaru', 'Toyota', 'DeLorean', 'Bentley');

        return [
            'id' => $this->faker->unique()->numberBetween(1, 1000000),           
            'marca' => $this->faker->unique()->randomElement($marcas),
        ];
    }
}