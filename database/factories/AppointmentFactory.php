<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('es_ES');

        // scheduled_at será asignado en el seeder para garantizar reglas de horario,
        // pero ponemos un fallback razonable aquí:
        $scheduled = Carbon::now()->addDays(rand(1, 30))->setTime(rand(8, 18), rand(0,1) * 30, 0);

        return [
            'patient_id' => Patient::inRandomOrder()->first()->id ?? Patient::factory(),
            'doctor_id' => Doctor::inRandomOrder()->first()->id ?? Doctor::factory(),
            'scheduled_at' => $scheduled,
            'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => $faker->optional(0.6)->sentence(8),
        ];
    }
}
