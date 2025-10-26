<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Суперадмин
        User::create([
            'name' => 'Суперадмин',
            'email' => 'superadmin@test.com',
            'password' => Hash::make('password'), // замени на более безопасный при необходимости
            'role' => 'superadmin',
        ]);

        // Модератор
        User::create([
            'name' => 'Модератор',
            'email' => 'moderator@test.com',
            'password' => Hash::make('password'),
            'role' => 'moderator',
        ]);
    }
}
