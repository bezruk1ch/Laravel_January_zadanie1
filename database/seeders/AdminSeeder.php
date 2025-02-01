<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Импортируем класс Hash
use Illuminate\Support\Str; // Импортируем класс Str

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                'name' => 'Мария',
                'middlename' => 'Сергеевна',
                'lastname' => 'Админ',
                'login' => 'adminka', // Логин остается прежним
                'password' => Hash::make('password'), // Хешируем пароль
                'tel' => '0123456789',
                'email' => 'sergeeva@example.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
