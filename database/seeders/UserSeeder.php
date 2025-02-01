<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Импортируем класс Hash
use Illuminate\Support\Str; // Импортируем класс Str

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'Иван',
                    'middlename' => 'Иванович',
                    'lastname' => 'Иванов',
                    'login' => 'ivanov',
                    'password' => Hash::make('password123'), // Хешируем пароль
                    'tel' => '1234567890',
                    'email' => 'ivanov@example.com',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Петр',
                    'middlename' => 'Петрович',
                    'lastname' => 'Петров',
                    'login' => 'petrov',
                    'password' => Hash::make('password123'), // Хешируем пароль
                    'tel' => '0987654321',
                    'email' => 'petrov@example.com',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ],
        );
    }
}
