<?php

namespace App\Http\Requests;

class CategoriasRequestRules
{
    public static function getValidationRules(): array
{
    return [
        'imagen_ruta' => ['nullable', 'url'],
        'descripcion' => 'required|max:255'
    ];
}
}