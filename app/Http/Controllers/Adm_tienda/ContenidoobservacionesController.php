<?php

namespace App\Http\Controllers\Adm_tienda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido_observacion;

class ContenidoobservacionesController extends Controller
{
  public function create()
  {
      $idtienda = Auth()->user()->tienda_id;
      $contenido = Contenido_observacion::where('tienda_id', $idtienda)->first();
      return redirect()->route('contenido_observaciones_t.edit', $contenido->id);
  }

  public function edit($id)
  {
      $contenido = Contenido_observacion::find($id);
      return view('adm_tienda.contenido_observaciones.edit')->with(compact('contenido', $contenido->id));
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

      return redirect()->route('contenido_observaciones_t.edit', $contenido->id);
  }
}
