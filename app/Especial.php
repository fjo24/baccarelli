<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especial extends Model
{
  protected $table    = "especiales";
  protected $fillable = [
      'descripcion',
  ];

  public function Pedidos()
  {
      return $this->belongsToMany('App\Pedido', 'especial_pedido', 'especial_id', 'pedido_id')->withPivot('precio');
  }

}
