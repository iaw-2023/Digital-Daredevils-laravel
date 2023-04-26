<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\Productos\TallesProducto;
use App\Models\Producto;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model=Producto::class;

    private function rndCategoriaId() : int {
        $idsCategoriasActuales = Categoria::pluck('id');
        $idElegidoRnd = $idsCategoriasActuales->random();
        return $idElegidoRnd;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // TODO 'talle'=>fake()->randomElement(TallesProducto::getValues()), problema <- benSampo? illuminate? instead of:
            'talle'=>fake()->randomElement(['xs', 's', 'm', 'l', 'xl']),
            'precio'=>fake()->randomFloat(2,0,500),
            'imagen_ruta'=>fake()->imageUrl(),
            'modelo'=>fake()->word,
            'marca'=>fake()->word,
            'categoria_id'=>$this->rndCategoriaId(),
        ];
    }
}
