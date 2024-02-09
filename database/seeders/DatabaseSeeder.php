<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call(RolesTableSeeder::class);

        \App\Models\User::factory(3)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'admin iaw',
            'email' => 'admin@iaw.com',
            'password' => bcrypt('admin123'),
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->role()->associate($adminRole);
        $admin->save();

        $employee = \App\Models\User::factory()->create([
            'name' => 'employee iaw',
            'email' => 'employee@iaw.com',
            'password' => bcrypt('employee123'),
            'role_id' => Role::where('name', 'employee')->first()->id,
        ]);
        $employeeRole = Role::where('name', 'employee')->first();
        $employee->role()->associate($employeeRole);
        $employee->save();

        //Resto de seeders
        $this->call(MarcaSeeder::class);
        $this->call(ReservaSeed::class);
        $this->call(VehiculoSeed::class);
        $this->call(ReservaDetallesSeed::class);
    }
}
