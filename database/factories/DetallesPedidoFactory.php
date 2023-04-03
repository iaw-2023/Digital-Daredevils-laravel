<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetallesPedido;
use App\Models\Pedido;
use App\Models\Producto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallePedido>
 */
class DetallesPedidoFactory extends Factory
{
    protected $model=DetallesPedido::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad'=>rand(1,20),
            'pedido_id'=>Pedido::factory(),
            'producto_id'=>Producto::factory(),
        ];
    }
}
