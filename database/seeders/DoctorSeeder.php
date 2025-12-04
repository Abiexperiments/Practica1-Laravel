<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        // Si no existen specialties, abortamos (o las creamos)
        if (\App\Models\Specialty::count() === 0) {
            $this->call(\Database\Seeders\SpecialtySeeder::class);
        }

        Doctor::factory()->count(25)->create();
    }
}
