<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    public function run(): void
    {
        $services = [
            ['name' => 'Šišanje muško', 'price' => 15.00, 'avg_time' => 30],
            ['name' => 'Šišanje žensko', 'price' => 25.00, 'avg_time' => 60],
            ['name' => 'Farbanje', 'price' => 45.00, 'avg_time' => 90],
            ['name' => 'Pramenovi', 'price' => 55.00, 'avg_time' => 120],
            ['name' => 'Brijanje', 'price' => 10.00, 'avg_time' => 15],
            ['name' => 'Šišanje + brada', 'price' => 20.00, 'avg_time' => 45],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }
    }
}
