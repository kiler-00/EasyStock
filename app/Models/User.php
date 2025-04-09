<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // <- Necesario para los roles

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // <- Activamos los roles aquí

    protected $fillable = [
        'name',
        'email',
        'password',
        'local',
        'idioma',
        'ubicacion',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación con ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    // Relación con configuraciones
    public function configuracion()
    {
        return $this->hasOne(Configuracion::class);
    }

    // Relación con notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    // Relación con reportes generados
    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}
