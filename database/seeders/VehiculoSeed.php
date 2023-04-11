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
        /*DB::table('vehiculos')->insert([
            'id' => Str::random(10),
            'name' => Str::random(10),
            'patente' => Str::random(7),
            'modelo' => Int::random(2020),
            'precio' => Int::random(1000),
        ]);*/ //No estoy seguro si esto va aca o no

        Vehiculo::factory()
            ->count(10)
            ->create();

    }
}
