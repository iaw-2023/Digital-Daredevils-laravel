<?php

namespace App\Http\Requests;

class CategoriasRequestRulesStore
{
    public static function getValidationRules(): array
    {
        return [
            'imagen_ruta' => ['nullable', 'url'],
            'nombre' => 'required|max:50|unique:categorias',
            'descripcion' => 'required|max:255'
        ];
    }
}