<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class DistribuidoresController extends Controller
{
    public function index()
    {
        $distribuidores = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function create()
    {
        return view('adm.distribuidores.create');
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
        $distribuidor->nivel    = 'distribuidor';
        $distribuidor->password = \Hash::make($request->password);
        $distribuidor->save();

        $distribuidores = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $distribuidor = User::find($id);
        return view('adm.distribuidores.edit')
            ->with('distribuidor', $distribuidor);
    }

    public function update(Request $request, $id)
    {
        $distribuidor           = User::find($id);
        $distribuidor->name     = $request->name;
        $distribuidor->apellido = $request->apellido;
        $distribuidor->username = $request->username;
        $distribuidor->telefono = $request->telefono;
        $distribuidor->email    = $request->email;
        $distribuidor->rango    = $request->rango;
        $distribuidor->nivel    = 'distribuidor';
        if(isset($request->password)){
            if ($request->password != $distribuidor->password) {
                $distribuidor->password = \Hash::make($request->password);
            }
        }

        $distribuidor->save();

        $distribuidores = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function destroy($id)
    {
        $distribuidor = User::find($id);
        $distribuidor->delete();
        return redirect()->route('distribuidores.index');
    }
}
