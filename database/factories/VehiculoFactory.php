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

    protected $model = Vehiculo::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->phoneNumber(),
            'name' => $this->faker->name(),
            'patente' => $this->faker->word(1, true),
            'modelo' => $this->faker->randomNumber($nbDigits = 4),
            'precio' => $this->faker->randomNumber($nbDigits = 5),
        ];
    }
}
