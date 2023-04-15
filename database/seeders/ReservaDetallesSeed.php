<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaDetallesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\ReservaDetalles::factory(5)->create();
        
        App\Models\ReservaDetalles::factory()->create([
            'id' => '86',
            'id_vehiculo' =>  '76',
            'id_reserva' =>  '99',
            'precio'=> true,
        ]);
        
    }
}