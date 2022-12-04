<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jdvuelo extends Model
{
    use HasFactory;

    public function jdaerolineas()
    {
        return $this->belongsTo(Jdaerolinea::class);
    }

    protected $fillable = [
        'ciudad_partida',
        'ciudad_destino',
        'numero_pasajero',
        'novedad_vuelo',
        'fecha_partida',
        'fecha_llegada',
        'jdaerolinea_id'
    ];

    protected function ciudadDestino():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtolower($value),
            get: fn($value)=>ucwords($value)
        );
    }
    protected function ciudadPartida():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtolower($value),
            get: fn($value)=>ucwords($value)
        );
    }
    protected function novedadVuelo():Attribute
    {
        return new Attribute(
            set: fn($value)=>strtolower($value),
            get: fn($value)=>ucfirst($value)
        );
    }
}
