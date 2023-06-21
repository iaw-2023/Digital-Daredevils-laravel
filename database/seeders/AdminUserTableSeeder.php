<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminUserTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@iaw.com',
            'password' =>  Hash::make('admin123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Empleado',
            'email' => 'empleado@iaw.com',
            'password' =>  Hash::make('empleado123')
        ])->assignRole('Empleado');

    }
}
