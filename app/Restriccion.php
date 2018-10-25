<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
    protected $table    = "restricciones";
    protected $fillable = [
        'nombre',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'restricciones_pedido', 'restriccion_id', 'pedido_id')->withPivot('especificacion');
    }
}
