<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega_horario extends Model
{
    protected $table    = "entrega_horarios";
    protected $fillable = [
        'horario',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'entrega_horario_pedido', 'entrega_horario_id', 'pedido_id');
    }

}
