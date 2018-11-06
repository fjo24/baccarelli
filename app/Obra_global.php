<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra_global extends Model
{
  protected $table    = "contenido_globales";
  protected $fillable = [
    'contenido', 'titulo',
  ];

}
