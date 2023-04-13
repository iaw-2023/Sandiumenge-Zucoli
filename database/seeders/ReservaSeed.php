<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reserva::factory(10)->create();

        Reserva::factory()->create([
            'id' => 'FAKEID',
        ]);
    }
}
