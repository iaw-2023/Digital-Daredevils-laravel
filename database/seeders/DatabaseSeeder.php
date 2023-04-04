<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CategoriasTableSeeder::class,ProductosTableSeeder::class,PedidosTableSeeder::class,DetallesPedidosTableSeeder::class,]);
    }
}
