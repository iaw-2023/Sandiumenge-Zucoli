<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::factory()
            ->count(10)
            ->create();
        
        Vehiculo::factory()->create([
            'id' => $this->faker->phoneNumber(),
            'name' => $this->faker->firstName(),
            'patente' => $this->faker->word(1, true),
            'modelo' =>  $this->faker->randomNumber($nbDigits = 4),
            'precio' =>  $this->faker->randomNumber($nbDigits = 5),
        ]);
        
    }
}
