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
        Vehiculo::factory(5)->create();
        
        Vehiculo::factory()->create([
            'name' => 'testName',
            'patente' => 'test',
            'modelo' =>  '1000',
            'precio' =>  '1',
        ]);
        
    }
}
