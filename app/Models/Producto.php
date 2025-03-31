<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'stock', 'precio', 'categoria'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}
