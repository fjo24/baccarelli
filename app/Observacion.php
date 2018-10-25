<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table    = "observaciones";
    protected $fillable = [
        'descripcion', 'costo',
    ];

    public function materiales()
    {
        return $this->hasMany('App\Material'); 
    }
}
