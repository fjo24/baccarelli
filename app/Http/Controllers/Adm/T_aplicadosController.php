<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\T_aplicado;
use App\Unidad;

class T_aplicadosController extends Controller
{
    public function index()
    {
        $aplicados = T_aplicado::orderBy('id', 'ASC')->get();
        return view('adm.aplicados.index')
            ->with('aplicados', $aplicados);
    }

    public function create()
    {
    	$unidades = Unidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.aplicados.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $aplicado           = new T_aplicado();
        $aplicado->descripcion     = $request->descripcion;
        $aplicado->precio       = $request->precio;
        $aplicado->unidad_id       = $request->unidad_id;
        $aplicado->save();

        $aplicados = T_aplicado::orderBy('id', 'ASC')->get();
        return view('adm.aplicados.index')
            ->with('aplicados', $aplicados);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $aplicado = T_aplicado::find($id);
        $unidades = Unidad::orderBy('nombre', 'ASC')->get();
        return view('adm.aplicados.edit', compact('unidades', 'aplicados'));
    }

    public function update(Request $request, $id)
    {
        $aplicado           = T_aplicado::find($id);
        $aplicado->descripcion     = $request->descripcion;
        $aplicado->precio       = $request->precio;
        $aplicado->unidad_id       = $request->unidad_id;
        $aplicado->save();

        $aplicados = T_aplicado::orderBy('id', 'ASC')->get();
        return view('adm.aplicados.index')
            ->with('aplicados', $aplicados);
    }

    public function destroy($id)
    {
        $aplicado = T_aplicado::find($id);
        $aplicado->delete();
        return redirect()->route('aplicados.index');
    }
}
