<?php

namespace Database\Factories;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;


class DoctorFactory extends Factory
{
     protected $model = Doctor::class;

    public function definition()
    {
        // Crear un Faker en español
        $faker = \Faker\Factory::create('es_ES');

        return [
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            // asignaremos specialty_id desde el seeder si ya existen specialties;
            // si no, creamos uno aleatorio
            'specialty_id' => Specialty::inRandomOrder()->first()->id ?? Specialty::factory(),
        ];
    }
   
}
