<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = ['user_id', 'mensaje', 'leida'];

    // Cast automático para que 'leida' sea boolean
    protected $casts = [
        'leida' => 'boolean',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope para obtener solo las no leídas
    public function scopeNoLeidas($query)
    {
        return $query->where('leida', false);
    }

    // Scope para obtener solo las leídas
    public function scopeLeidas($query)
    {
        return $query->where('leida', true);
    }

    // Marcar la notificación como leída
    public function marcarComoLeida()
    {
        $this->update(['leida' => true]);
    }
}
