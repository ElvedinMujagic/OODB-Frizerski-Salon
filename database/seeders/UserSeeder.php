<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

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
            'name' => 'Elvedin',
            'lastname' => 'Mujagic',
            'email' => 'marko@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Elvin',
            'lastname' => 'Pecenkovic',
            'email' => 'elvin@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Emir',
            'lastname' => 'Srebric',
            'email' => 'emir@salon.test',
            'password' => $password,
            'role' => User::ROLE_STYLIST,
        ]);

        User::create([
            'name' => 'Sarah',
            'lastname' => 'Kuric',
            'email' => 'sarah@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);

        User::create([
            'name' => 'Suad',
            'lastname' => 'Marić',
            'email' => 'suad@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);

        User::create([
            'name' => 'Sajra',
            'lastname' => 'Alibabic',
            'email' => 'sajra@salon.test',
            'password' => $password,
            'role' => User::ROLE_CLIENT,
        ]);
    }
}
