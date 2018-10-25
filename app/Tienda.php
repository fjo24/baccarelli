<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{

	protected $table    = "tiendas";
    protected $fillable = [
        'nombre', 'cuit', 'logo', 'email', 'orden_compra',
    ];

    public function pedidos()
    {
        return $this->hasMany('App\Producto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal');
    }
}
