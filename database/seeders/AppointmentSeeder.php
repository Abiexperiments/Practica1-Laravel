<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        $doctorsCount = Doctor::count();
        $patientsCount = Patient::count();

        if ($doctorsCount === 0 || $patientsCount === 0) {
            $this->command->error("Necesitas al menos 1 doctor y 1 paciente antes de sembrar citas.");
            return;
        }

        // Generar todos los slots válidos en los próximos 45 días (excluyendo domingos)
        $slots = [];
        $startDate = Carbon::now()->startOfDay();
        $daysToGenerate = 45;

        for ($d = 0; $d <= $daysToGenerate; $d++) {
            $day = $startDate->copy()->addDays($d);
            $weekday = (int)$day->dayOfWeek; // 0 = domingo

            if ($weekday === 0) {
                continue; // saltar domingo
            }

            // Horario: 08:00 a 18:30 (último inicio a las 18:30)
            $hour = 8;
            $minute = 0;
            while (true) {
                $slot = $day->copy()->setTime($hour, $minute, 0);
                // Si el slot ya está más de 45 días si fuese necesario, omitimos - no necesario
                // Guardar slot
                $slots[] = $slot->toDateTimeString();

                // incrementar 30 minutos
                $minute += 30;
                if ($minute >= 60) {
                    $minute = 0;
                    $hour++;
                }

                // terminar si hora > 18 o si hora == 18 y minute > 30
                if ($hour > 18 || ($hour == 18 && $minute > 30)) {
                    break;
                }
            }
        }

        // Si slots < 150 no podemos crear 150 citas en distintos slots; aún así permitimos repetidos
        // Para mejor distribución intentamos tomar slots aleatorios (pueden repetirse, distintos doctors)
        $slotsCount = count($slots);

        $appointmentsToCreate = 150;

       for ($i = 0; $i < $appointmentsToCreate; $i++) {

    $slotIndex = rand(0, $slotsCount - 1);
    $scheduledAt = Carbon::parse($slots[$slotIndex]);

    $tries = 0;
    $created = false;

    while (!$created && $tries < 10) {
        $doctorId = Doctor::inRandomOrder()->first()->id;
        $patientId = Patient::inRandomOrder()->first()->id;

        // 📌 Checar si ya hay una cita del doctor en ese mismo horario
        $exists = Appointment::where('doctor_id', $doctorId)
            ->where('scheduled_at', $scheduledAt)
            ->exists();

        if (!$exists) {
            Appointment::create([
                'doctor_id' => $doctorId,
                'patient_id' => $patientId,
                'scheduled_at' => $scheduledAt,
                'status' => 'pending',
                'notes' => null,
            ]);
            $created = true;
        }

        $tries++;
    }
}
    }
}
