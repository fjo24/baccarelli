<?php

namespace App\Http\Controllers\Tienda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pedido;
use App\Superficie;
use App\Material;
use App\Borde;
use App\T_aplicado;
use App\Stock;
use App\Adicional;

class TiendaController extends Controller
{
    public function material($id)
    {
        $material = Material::find($id);
        $material->adicional = 0;
        if(isset($material->stock))
        {
            $material->existencia = $material->stock->descripcion;
        }
        if($material->rubro_id==1||$material->rubro_id==3||$material->rubro_id==4||$material->rubro_id==2)
        {
            $adicional = Adicional::where('descripcion','Leather')->first();
            $material->adicional = $adicional->costo;
            $material->suma = true;
        }
        if($material->observacion=='RP'||$material->observacion=='RP - MAT. EN PROMOCIÓN')
        {
            $adicional = Adicional::where('descripcion','RP')->first();
            $material->adicional = $adicional->costo;
            $material->suma = false;
        }
        return $material->toJson();
    }

    public function borde($id)
    {
        $borde = Borde::find($id);
        return $borde->toJson();
    }

    public function aplicado($id)
    {
        $trabajo = T_aplicado::find($id);
        if(isset($trabajo->unidad))
        {
            $trabajo->uni = $trabajo->unidad->nombre;
        }
        return $trabajo->toJson();
    }

    public function especial($id)
    {
        $superficie = Superficie::find($id);
        return $superficie->toJson();
    }

    public function login()
    {
        $activo    = 'home';
        return view('tienda.login.login', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4'));
    }

    public function home()
    {
        $activo = 'home';
        return redirect()->route('pedidostienda.create', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'user'));
    }

    public function presupuestos()
    {
        $user = User::find(Auth()->user()->id);
        $pedidos = Pedido::orderBy('id', 'ASC')->Where('user_id', $user->id)->get();
        return view('tienda.pedidos.presupuestos', compact('user', 'pedidos', 'superficies'));
    }
}
