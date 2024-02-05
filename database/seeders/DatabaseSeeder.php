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
        // Seed roles
         $this->call(RolesTableSeeder::class);

        // Seed users
        \App\Models\User::factory(3)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'admin iaw',
            'email' => 'admin@iaw.com',
            'password' => bcrypt('admin123'),
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);

        // Assign the admin role to the admin user
        $adminRole = Role::where('name', 'admin')->first();
        $admin->role()->associate($adminRole);
        $admin->save();

        // Other seeders...
        $this->call(MarcaSeeder::class);
        $this->call(ReservaSeed::class);
        $this->call(VehiculoSeed::class);
        $this->call(ReservaDetallesSeed::class);
    }
}
