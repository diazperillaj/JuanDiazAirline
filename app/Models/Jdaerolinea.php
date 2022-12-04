<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jdaerolinea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit'
    ];

    public function jdvuelos()
    {
        return $this->hasMany(Jdvuelo::class);
    }

    protected function nombre(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }
}
