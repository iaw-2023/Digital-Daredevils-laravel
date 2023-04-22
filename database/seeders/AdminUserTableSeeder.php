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
            'name' => 'admin@iaw.com',
            'email' => 'digitalDareDevilWeb@gmail.com',
            'password' =>  Hash::make('admin123')
        ]);
    }
}
