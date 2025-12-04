<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(ProductoSeeder::class);
        // User::factory(10)->create();
        
$this->call([
            \Database\Seeders\SpecialtySeeder::class,
            \Database\Seeders\DoctorSeeder::class,
            \Database\Seeders\PatientSeeder::class,
            \Database\Seeders\AppointmentSeeder::class,
        ]);
    }
}
