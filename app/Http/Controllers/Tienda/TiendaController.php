<?php

namespace App\Http\Controllers\Tienda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pedido;
use App\Superficie;

class TiendaController extends Controller
{
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
