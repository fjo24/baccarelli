<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Observacion;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{
    public function index()
    {
        $observaciones = Observacion::orderBy('id', 'ASC')->get();
        return view('adm.observaciones.index')
            ->with('observaciones', $observaciones);
    }

    public function create()
    {
        return view('adm.observaciones.create');
    }

    public function store(Request $request)
    {
        $observacion              = new Observacion();
        $observacion->descripcion = $request->descripcion;
        $observacion->costo       = $request->costo;
        $observacion->save();

        $observaciones = Observacion::orderBy('id', 'ASC')->get();
        return view('adm.observaciones.index')
            ->with('observaciones', $observaciones);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Observacion::find($id);
        return view('adm.observaciones.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $observacion           = Observacion::find($id);
        $observacion->descripcion = $request->descripcion;
        $observacion->costo       = $request->costo;
        $observacion->save();

        $observaciones = Observacion::orderBy('id', 'ASC')->get();
        return view('adm.observaciones.index')
            ->with('observaciones', $observaciones);
    }

    public function destroy($id)
    {
        $observacion = Observacion::find($id);
        $observacion->delete();
        return redirect()->route('observaciones.index');
    }
}
