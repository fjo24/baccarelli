<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table    = "materiales";
    protected $fillable = [
        'nombre', 'espesor', 'orden', 'codigo', 'precio', 'cost', 'leather', 'rp', 'diamantado', 'moneda', 'rubro_id', 'observacion_id', 'stock_id', 'descuento_id', 
    ];

    public function rubro()
    {
        return $this->belongsTo('App\Rubro');
    }

    public function unidad()
    {
        return $this->belongsTo('App\Unidad');
    }

    public function observacion()
    {
        return $this->belongsTo('App\Observacion');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }

    public function descuento()
    {
        return $this->belongsTo('App\Descuento');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'material_pedido', 'rubro_id', 'material_id')->withPivot('superficie_id', 'largo', 'ancho', 'metros_cuadrados', 'precio_unit_material', 'costo');
    }

}
