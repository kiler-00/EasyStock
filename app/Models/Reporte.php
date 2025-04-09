<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',         // Quién generó el reporte
        'tipo',            // Tipo de reporte (ej: ingresos, comparativa, más vendidos, etc.)
        'parametros',      // Parámetros aplicados (puede ser JSON)
        'generado_en',     // Fecha/hora de generación
    ];

    // Relación con usuario que lo generó
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor para convertir los parámetros JSON a array automáticamente
    public function getParametrosAttribute($value)
    {
        return json_decode($value, true);
    }

    // Mutator para guardar los parámetros como JSON
    public function setParametrosAttribute($value)
    {
        $this->attributes['parametros'] = json_encode($value);
    }
}
