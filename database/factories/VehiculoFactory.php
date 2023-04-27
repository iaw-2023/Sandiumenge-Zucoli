<?php

namespace Database\Factories;

use app\models\Vehiculo;
use app\models\Marca;
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
            'id' => $this->faker->unique()->numberBetween(0,10000),
            'id_marca'=> fake()->randomElement(Marca::all())['id'],
            'modelo' => $this->faker->numberBetween(1000,2000),
            'precio' => $this->faker->numberBetween(0,1000),
            'disponible'=> true,
        ];
    }
}
