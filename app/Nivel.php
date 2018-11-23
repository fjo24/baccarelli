<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
  protected $table    = "niveles";
  protected $fillable = [
      'nivel1a', 'nivel1b', 'nivel1c', 'nivel2a', 'nivel2b', 'nivel2c', 'nivel3a', 'nivel3b', 'nivel3c',
  ];

}
