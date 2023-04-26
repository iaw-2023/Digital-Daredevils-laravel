<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Productos\TallesProducto;
use Illuminate\Validation\Rules\Enum;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'talle' => 'required', [new Enum(TallesProducto::class)],
            'precio' => 'required|decimal:2|max:1000000',
            'imagen' => [
                'nullable',
                'file',
                'max:2048', // máximo tamaño del archivo en kilobytes
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000' // tamaño de la imagen en píxeles
            ],
            'modelo' => 'required|max:100',
            'marca' => 'required|max:100'
        ];
    }
}
