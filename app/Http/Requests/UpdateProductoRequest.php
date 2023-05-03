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
            'precio' => 'required|numeric|min:1|max:1000000|regex:/^\d+(\.\d{1,2})?$/',
            'imagen_ruta' => ['nullable', 'url'],
            'modelo' => 'required|max:100',
            'marca' => 'required|max:100',
            'talle' => 'required|not_in:0', [new Enum(TallesProducto::class)], // not_in:0 por el selected hidden value: 'selecciona categoria'
            'categoria_id' => 'required|not_in:0|exists:categorias,id' // not_in:0 por el selected hidden value: 'selecciona categoria'
        ];
    }
}
