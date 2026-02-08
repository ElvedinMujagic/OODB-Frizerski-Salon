<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('password');

        User::create([
            'name' => 'Admin',
            'lastname' => 'Adminić',
            'email' => 'admin@salon.test',
            'password' => $password,
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'name' => 'Marko',
            'lastname' => 'Frizer',
            'email' => 'marko@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Ana',
            'lastname' => 'Kovač',
            'email' => 'ana@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Petra',
            'lastname' => 'Horvat',
            'email' => 'petra@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Ivan',
            'lastname' => 'Klijent',
            'email' => 'ivan@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);

        User::create([
            'name' => 'Jelena',
            'lastname' => 'Marić',
            'email' => 'jelena@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);

        User::create([
            'name' => 'Tomislav',
            'lastname' => 'Novak',
            'email' => 'tomislav@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);
    }
}
