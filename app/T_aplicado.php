<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_aplicado extends Model
{
    protected $table    = "t_aplicados";
    protected $fillable = [
        'descripcion', 'unidad_id', 'precio',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 't_aplicado_pedido', 't_aplicado_id', 'pedido_id')->withPivot('cantidad', 'monto');
    }

    public function unidad()
    {
        return $this->belongsTo('App\Unidad');
    }
}
