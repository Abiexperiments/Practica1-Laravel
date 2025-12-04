<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    public function run()
    {
        $specialties = [
            ['name' => 'Cardiología', 'description' => 'Enfermedades del corazón.'],
            ['name' => 'Dermatología', 'description' => 'Enfermedades de la piel.'],
            ['name' => 'Pediatría', 'description' => 'Atención médica infantil.'],
            ['name' => 'Ginecología', 'description' => 'Salud femenina y reproductiva.'],
            ['name' => 'Medicina General', 'description' => 'Atención primaria y diagnósticos generales.'],
            ['name' => 'Ortopedia', 'description' => 'Afecciones musculoesqueléticas.'],
        ];

        foreach ($specialties as $s) {
            Specialty::updateOrCreate(['name' => $s['name']], $s);
        }
    }
}
