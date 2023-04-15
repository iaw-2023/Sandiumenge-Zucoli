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
            'id' => '76',
            'id_marca'=> '99',
            'modelo' =>  '1000',
            'precio' =>  '1',
            'disponible'=> true,
        ]);
        
    }
}
