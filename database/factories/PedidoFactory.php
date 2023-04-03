<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pedido>
 */
class PedidoFactory extends Factory
{
    protected $model=Pedido::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente'=>fake()->email(),
            'fecha'=>fake()->dateTime(),
        ];
    }
}
