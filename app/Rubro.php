<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table    = "rubros";
    protected $fillable = [
        'nombre',
    ];

    public function materiales()
    {
        return $this->hasMany('App\Material');
    }

}
