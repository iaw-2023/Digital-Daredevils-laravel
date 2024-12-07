<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Enum;
use App\Enums\Productos\TallesProducto;

class ProductosRequestRules
{
    public static function getValidationRules(): array
    {
        return [
            'precio' => 'required|numeric|min:1|max:100000000|regex:/^\d+(\.\d{1,2})?$/',
            'imagen_ruta' => ['nullable','image'],
            'modelo' => 'required|max:100',
            'marca' => 'required|max:100',
            'talle' => 'required|not_in:0', [new Enum(TallesProducto::class)], // not_in:0 por el selected hidden value: 'selecciona categoria'
            'categoria_id' => 'required|not_in:0|exists:categorias,id' // not_in:0 por el selected hidden value: 'selecciona categoria'
        ];
    }
}