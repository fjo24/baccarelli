<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table    = "sucursales";
    protected $fillable = [
        'nombre', 'telefono', 'tienda_id',
    ];

    public function tiendas()
    {
        return $this->hasMany('App\Tienda');
    }
}
