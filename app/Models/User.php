<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'local',
        'idioma',
        'ubicacion',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function configuracion()
    {
        return $this->hasOne(Configuracion::class);
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}
