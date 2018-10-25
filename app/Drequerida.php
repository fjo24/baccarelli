<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drequerida extends Model
{
    protected $table    = "drequerida";
    protected $fillable = [
        'nombre','descripcion',
    ];

    public function Pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'drequerida_pedido', 'drequerida_id', 'pedido_id')->withPivot('especificacion');
    }
}
