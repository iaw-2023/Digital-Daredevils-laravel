<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Productos\TallesProducto;
use Illuminate\Validation\Rules\Enum;

class UpdateProductoRequest extends FormRequest
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
            'precio' => 'required|decimal:2|max:1000000',
            'imagen_ruta' => ['nullable', 'url', 'dimensions:min_width=50,min_height=50'],
            'modelo' => 'required|max:100',
            'marca' => 'required|max:100',
            'talle' => 'required', [new Enum(TallesProducto::class)],
            'categoria_id' => 'required|not_in:0|exists:categorias,id' // not_in:0 por el selected hidden value: 'selecciona categoria'
        ];
    }
}
