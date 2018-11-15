<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table    = "pedidos";
    protected $fillable = [
        'fecha', 'info1', 'info2', 'numero_presupuesto','numero_proyecto',
        'nombre_cliente','apellido_cliente', 'localidad','telefono1',
        'telefono2','telefono3', 'encargado','telefono_encargado',
        'aclaracion', 'listado_id', 'user_id','pedido_id', 'selector','estado_id',
    ];

    public function EntregaHorarios()
    {
        return $this->belongsToMany('App\Entrega_horario', 'entrega_horario_pedido', 'pedido_id', 'entrega_horario_id');
    }

    public function EntregaDias()
    {
        return $this->belongsToMany('App\Entrega_dia', 'entrega_dia_pedido', 'pedido_id', 'entrega_dia_id');
    }

    public function Drequerida()
    {
        return $this->belongsToMany('App\Drequerida', 'drequerida_pedido', 'pedido_id', 'drequerida_id')->withPivot('especificacion');
    }

    public function Restricciones()
    {
        return $this->belongsToMany('App\Restriccion', 'restricciones_pedido', 'pedido_id', 'restriccion_id')->withPivot('especificacion');
    }

    public function Estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Materiales()
    {
        return $this->belongsToMany('App\Material', 'material_pedido', 'pedido_id', 'material_id');
    }

    public function Bordes()
    {
        return $this->belongsToMany('App\Borde', 'borde_pedido', 'pedido_id', 'borde_id');
    }

}
