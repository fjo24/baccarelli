<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
    protected $table    = "dolares";
    protected $fillable = [
        'valor',
    ];
}
