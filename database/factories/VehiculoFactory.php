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
            'id' => $this->faker->numberBetween(0,10000),
            'id_marca'=> '99',
            'modelo' => $this->faker->numberBetween(1000,2000),
            'precio' => $this->faker->numberBetween(0,1000),
            'disponible'=> true,
        ];
    }
}
