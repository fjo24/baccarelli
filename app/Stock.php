<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table    = "stocks";
    protected $fillable = [
        'descripcion',
    ];

    public function materiales()
    {
        return $this->hasMany('App\Material'); 
    }
}