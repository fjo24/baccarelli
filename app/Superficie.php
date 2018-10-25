<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superficie extends Model
{
    protected $table    = "superficies";
    protected $fillable = [
        'descripcion', 'costo',
    ];
}
