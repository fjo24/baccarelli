<?php

namespace App\Http\Controllers\Adm;

use App\Contenido_observacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContenidoobservacionesController extends Controller
{
    public function create()
    {
        $contenido = Contenido_observacion::all()->first();
        return redirect()->route('contenido_observaciones.edit', $contenido->id);
    }

    public function edit($id)
    {
        $contenido = Contenido_observacion::find($id);
        return view('adm.contenido_observaciones.edit')->with(compact('contenido'));
    }

    public function update(Request $request, $id)
    {
        $contenido                         = Contenido_observacion::find($id);
        $contenido->titulo_condiciones     = $request->titulo_condiciones;
        $contenido->contenido_condiciones  = $request->contenido_condiciones;
        $contenido->titulo_plazos          = $request->titulo_plazos;
        $contenido->contenido_plazos       = $request->contenido_plazos;
        $contenido->titulo_aclaraciones    = $request->titulo_aclaraciones;
        $contenido->contenido_aclaraciones = $request->contenido_aclaraciones;

        $contenido->update();

        return redirect()->route('contenido_observaciones.edit', $contenido->id);
    }
}
