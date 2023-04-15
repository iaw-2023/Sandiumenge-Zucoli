<?php

namespace Database\Factories;

use app\models\ReservaDetalles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservaDetallesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(0,100),
            'id_vehiculo' => $this->faker->numberBetween(1000,2000),
            'id_reserva' => $this->faker->numberBetween(0,1000),
            'precio' => $this->faker->numberBetween(0,1000),
        ];
    }
}