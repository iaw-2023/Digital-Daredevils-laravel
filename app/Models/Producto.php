<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    protected $fillable = ['talle','precio','imagen_ruta','modelo','marca', 'categoria_id'];
    protected $guarded = ['id'];

    use HasFactory;
    
    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class);
    }

    public function pedidos(): BelongsToMany {
        return $this->belongsToMany(Pedido::class, 'detalles_pedidos')->withPivot('cantidad');
    }
}
