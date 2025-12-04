<?php

namespace Database\Factories;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

  class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('es_ES');

        // Fecha de nacimiento aleatoria entre 18 y 90 años
        $dateOfBirth = $faker->dateTimeBetween('-90 years', '-18 years')->format('Y-m-d');


        return [
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'date_of_birth' => $dateOfBirth,
        ];
    }
}
