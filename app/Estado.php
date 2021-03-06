<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  protected $table    = "estados";
  protected $fillable = [
      'descripcion', 'selector',
  ];

  public function pedidos()
  {
      return $this->hasMany('App\Pedido');
  }

}
