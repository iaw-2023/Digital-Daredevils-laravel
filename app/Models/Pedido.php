<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    protected $fillable = ['cliente','fecha', 'mercadopagoPaymentId'];
    protected $guarded = ['id'];

    use HasFactory;

    public function productos(): BelongsToMany {
        return $this->belongsToMany(Producto::class, 'detalles_pedidos')->withPivot('cantidad')->withTimeStamps();
    }
}
