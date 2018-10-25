<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'apellido', 'cuit', 'telefono', 'username', 'email', 'nivel', 'password', 'activo', 'tienda_id', 'rango',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pedidos()
    {
        return $this->hasMany('App\Producto');
    }

    public function tiendas()
    {
        return $this->hasMany('App\Tienda');
    }

}
