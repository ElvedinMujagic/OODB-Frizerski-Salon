<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkHours;
use Illuminate\Database\Seeder;

class WorkHoursSeeder extends Seeder
{

    public function run(): void
    {
        $stylists = User::where('role', User::ROLE_STYLIST)->get();

        foreach ($stylists as $stylist) {
            WorkHours::updateOrCreate(
                ['user_id' => $stylist->id],
                [
                    'start_time' => '08:00',
                    'end_time' => '16:00',
                ]
            );
        }
    }
}
