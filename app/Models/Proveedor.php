<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = ['nombre', 'contacto'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function getContactoFormateadoAttribute()
    {
        return ucfirst($this->contacto);
    }
}
