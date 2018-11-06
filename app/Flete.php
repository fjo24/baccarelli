<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flete extends Model
{
    protected $table    = "fletes";
    protected $fillable = [
        'flete','colocacion','medicion',
    ];
}
