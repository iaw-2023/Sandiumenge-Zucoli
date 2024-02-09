<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservaDetalles;

class ReservaDetallesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservaDetalles::factory(5)->create();
        
    }
}