<?php

namespace Database\Seeders;
use App\Models\DetallesPedido;
use Illuminate\Database\Seeder;

class DetallesPedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetallesPedido::factory()->count(50)->create();
    }
}
