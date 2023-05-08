<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

class CategoriasRequestRulesEdit
{
    public static function getValidationRules($categoria): array
{
    return [
        'imagen_ruta' => ['nullable', 'url'],
        'nombre' => [
            'required',
            Rule::unique('categorias', 'nombre')->ignore($categoria->id),
        ],
        'descripcion' => 'required|max:255'
    ];
}
}