<?php

namespace App\Http\Controllers\Adm_tienda;

use App\Http\Controllers\Controller;
use App\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function index()
    {
        $idtienda   = Auth()->user()->tienda_id;
        $sucursales = Sucursal::orderBy('id', 'ASC')->Where('tienda_id', $idtienda)->get();
        return view('adm_tienda.sucursales.index')
            ->with('sucursales', $sucursales);
    }

    public function create()
    {
        return view('adm_tienda.sucursales.create');
    }

    public function store(Request $request)
    {
        $sucursal            = new Sucursal();
        $sucursal->nombre    = $request->nombre;
        $sucursal->telefono  = $request->telefono;
        $sucursal->tienda_id = Auth()->user()->tienda_id;
        $sucursal->save();
        return redirect()->route('sucursales.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sucursal = Sucursal::find($id);
        return view('adm_tienda.sucursales.edit')
            ->with('sucursal', $sucursal);
    }

    public function update(Request $request, $id)
    {
        $sucursal            = Sucursal::find($id);
        $sucursal->nombre    = $request->nombre;
        $sucursal->telefono  = $request->telefono;
        $sucursal->tienda_id = Auth()->user()->tienda_id;
        $sucursal->save();
        return redirect()->route('sucursales.index');
    }

    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->delete();
        return redirect()->route('sucursales.index');
    }
}
