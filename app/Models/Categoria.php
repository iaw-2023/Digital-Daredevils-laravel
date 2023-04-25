<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $fillable = ['imagen_ruta','imagen_nombre_original','imagen_tamano','imagen_ancho','imagen_alto','nombre','descripcion'];
    protected $guarded = ['id'];
    
    use HasFactory;

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
