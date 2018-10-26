<?php

namespace App\Http\Controllers\Adm_tienda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sucursal;

class DistribuidoresTiendaController extends Controller
{
    public function index()
    {	
    	$idtienda = Auth()->user()->tienda_id;
        $distribuidores = User::orderBy('id', 'ASC')->Where('tienda_id', $idtienda)->Where('nivel', 'distribuidor')->get();
        return view('adm_tienda.users.index')
            ->with('distribuidores', $distribuidores);
    }

    public function create()
    {
        $idtienda = Auth()->user()->tienda_id;
        $sucursales = Sucursal::orderBy('id', 'ASC')->Where('tienda_id', $idtienda)->pluck('nombre', 'id')->all();
        return view('adm_tienda.users.create', compact('sucursales'));
    }

    public function store(Request $request)
    {
        $distribuidor           = new User();
        $distribuidor->name     = $request->name;
        $distribuidor->apellido = $request->apellido;
        $distribuidor->username = $request->username;
        $distribuidor->telefono = $request->telefono;
        $distribuidor->email    = $request->email;
        $distribuidor->rango    = $request->rango;
        $distribuidor->sucursal_id    = $request->sucursal_id;
        $distribuidor->tienda_id    = Auth()->user()->tienda_id;
        $distribuidor->nivel    = 'distribuidor';
        $distribuidor->password = \Hash::make($request->password);
        $distribuidor->save();

        $distribuidores = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return redirect()->route('distribuidorestienda.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $idtienda = Auth()->user()->tienda_id;
        $distribuidor = User::find($id);
        $sucursales = Sucursal::orderBy('id', 'ASC')->Where('tienda_id', $idtienda)->pluck('nombre', 'id')->all();
        return view('adm_tienda.users.edit', compact('sucursales', 'distribuidor'));
    }

    public function update(Request $request, $id)
    {
        $distribuidor           = User::find($id);
        $distribuidor->name     = $request->name;
        $distribuidor->apellido = $request->apellido;
        $distribuidor->username = $request->username;
        $distribuidor->telefono = $request->telefono;
        $distribuidor->email    = $request->email;
        if(isset($request->rango)){
            $distribuidor->rango    = $request->rango;
        }
        $distribuidor->sucursal_id    = $request->sucursal_id;
        $distribuidor->tienda_id    = Auth()->user()->tienda_id;
        $distribuidor->nivel    = 'distribuidor';
        if(isset($request->password)){
            if ($request->password != $distribuidor->password) {
                $distribuidor->password = \Hash::make($request->password);
            }
        }

        $distribuidor->save();
        return redirect()->route('distribuidorestienda.index');
    }

    public function destroy($id)
    {
        $distribuidor = User::find($id);
        $distribuidor->delete();
        return redirect()->route('distribuidorestienda.index');
    }
}
