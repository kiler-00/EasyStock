<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'stock', 'precio', 'categoria_id'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

    public function ventas()
    {
    return $this->hasMany(\App\Models\Venta::class);
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function getAlertaStockAttribute()
    {
        return $this->stock < 5 ? '¡Stock bajo!' : 'Stock suficiente';
    }
}
