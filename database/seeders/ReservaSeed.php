<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Reserva::factory(5)->create();

        \App\Models\Reserva::factory()->create([
            'id' => '123',
        ]);
    }
}
