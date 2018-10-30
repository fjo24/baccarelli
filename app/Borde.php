<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borde extends Model
{
    protected $table    = "bordes";
    protected $fillable = [
        'descripcion', 'precio',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'borde_pedido', 'borde_id', 'pedido_id')->withPivot('largo', 'monto');
    }
}
