<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = User::where('role', User::ROLE_CLIENT)->pluck('id')->all();
        $stylists = User::where('role', User::ROLE_STYLIST)->pluck('id')->all();
        $services = Service::pluck('id')->all();

        if (empty($clients) || empty($stylists) || empty($services)) {
            return;
        }

        $statuses = [
            Appointment::STATUS_PENDING,
            Appointment::STATUS_ACCEPTED,
            Appointment::STATUS_REJECTED,
        ];

        $baseDate = Carbon::now()->addDays(1)->setTime(9, 0);

        for ($i = 0; $i < 12; $i++) {
            Appointment::create([
                'client_id' => $clients[array_rand($clients)],
                'stylist_id' => $stylists[array_rand($stylists)],
                'service_id' => $services[array_rand($services)],
                'appointment_at' => $baseDate->copy()->addDays($i * 2)->setTime(9 + ($i % 6), 0),
                'status' => $statuses[array_rand($statuses)],
                'notes' => $i % 3 === 0 ? 'Napomena za termin.' : null,
            ]);
        }
    }
}
