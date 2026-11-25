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

        User::updateOrCreate(
            ['email' => 'admin@resort.com'],
            [
                'name' => 'Administrador Adulto',
                'password' => $password,
                'is_admin' => true,
                'age' => 35,
            ],
        );

        User::updateOrCreate(
            ['email' => 'cliente@resort.com'],
            [
                'name' => 'Cliente Adulto',
                'password' => $password,
                'is_admin' => false,
                'age' => 25,
            ],
        );

        User::updateOrCreate(
            ['email' => 'menor@resort.com'],
            [
                'name' => 'Cliente Menor',
                'password' => $password,
                'is_admin' => false,
                'age' => 16,
            ],
        );
    }
}
