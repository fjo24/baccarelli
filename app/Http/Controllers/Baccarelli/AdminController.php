<?php

namespace App\Http\Controllers\Baccarelli;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        $activo    = 'home';
        return view('admin.login.login', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4'));
    }

    public function home()
    {
    	$activo = 'home';
        return redirect()->route('baccarelli.presupuestos', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4'));
    }

}
