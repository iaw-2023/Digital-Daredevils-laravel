<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetallesPedido extends Model
{
    protected $fillable = ['cantidad'];
    protected $guarded = ['id','pedido_id','producto_id'];
    
    use HasFactory;

    public function productos(): HasMany {
        return $this->hasMany(Producto::class);
    }

    public function pedidos(): BelongsTo {
        return $this->belongsTo(Pedido::class);
    }
}
