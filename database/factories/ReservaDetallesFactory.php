<?php

namespace Database\Factories;

use app\models\ReservaDetalles;
use app\models\Vehiculo;
use app\models\Reserva;
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
            'id' => $this->faker->unique()->numberBetween(0,100),
            'id_vehiculo' => fake()->randomElement(Vehiculo::all())['id'],
            'id_reserva' => fake()->randomElement(Reserva::all())['id'],
            'precio' => $this->faker->numberBetween(0,1000),
        ];
    }
}