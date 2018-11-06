<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Obra_global;
use App\Http\Controllers\Controller;

class ContenidoObrasGlobalesController extends Controller
{
  public function create()
  {
      $contenido = Obra_global::all()->first();
      return redirect()->route('contenido_globales.edit', $contenido->id);
  }

  public function edit($id)
  {
      $contenido = Obra_global::find($id);
      return view('adm.contenido_globales.edit')->with(compact('contenido'));
  }

  public function update(Request $request, $id)
  {
      $contenido                         = Obra_global::find($id);
      $contenido->titulo                 = $request->titulo;
      $contenido->contenido              = $request->contenido;
      $contenido->update();

      return redirect()->route('contenido_globales.edit', $contenido->id);
  }
}
