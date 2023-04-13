<?php

namespace Database\Factories;

use app\models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'patente' => $this->faker->numberBetween(0,100),
            'modelo' => $this->faker->numberBetween(1000,2000),
            'precio' => $this->faker->numberBetween(0,1000),
        ];
    }
}
