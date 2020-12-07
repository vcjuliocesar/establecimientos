<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estableciomiento extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'imagen_principal',
        'direccion',
        'colonia',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'apertura',
        'cierre',
        'uuid',
    ];
}
