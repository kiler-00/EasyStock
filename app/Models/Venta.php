<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['producto_id', 'cantidad', 'total', 'user_id', 'cliente', 'fecha'];

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el usuario que registró la venta
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
