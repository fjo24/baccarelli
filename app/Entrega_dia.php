<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega_dia extends Model
{
    protected $table    = "entrega_dias";
    protected $fillable = [
        'dia',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'entrega_dia_pedido', 'entrega_dia_id', 'pedido_id');
    }
}
