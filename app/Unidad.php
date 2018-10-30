<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table    = "unidades";
    protected $fillable = [
        'nombre', 'sigla',
    ];

    public function materiales()
    {
        return $this->hasMany('App\Material'); 
    }

    public function t_aplicados()
    {
        return $this->hasMany('App\T_aplicado'); 
    }
}
