<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_observacion extends Model
{
    protected $table    = "contenido_observaciones";
    protected $fillable = [
        'titulo_condiciones', 'contenido_condiciones','titulo_plazos', 'contenido_plazos','titulo_aclaraciones', 'contenido_aclaraciones',
    ];
}