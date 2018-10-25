<?php

namespace App\Http\Controllers\Adm_tienda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTiendaController extends Controller
{
    public function index()
    {
        return view('zproductos');
    }

    public function dashboard()
    {
        return redirect()->route('login');
        //return view('login');
    }

    public function admin()
    {
        return view('adm_tienda.dashboard');
    }
}
