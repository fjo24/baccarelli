<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estado;

class EstadosController extends Controller
{
  public function index()
  {
      $estados = Estado::orderBy('id', 'ASC')->get();
      return view('adm.estados.index')
          ->with('estados', $estados);
  }

  public function create()
  {
      return view('adm.estados.create');
  }

  public function store(Request $request)
  {
      $estado           = new Estado();
      $estado->descripcion     = $request->descripcion;
      $estado->save();

      $estados = Estado::orderBy('id', 'ASC')->get();
      return view('adm.estados.index')
          ->with('estados', $estados);
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      $estado = Estado::find($id);
      return view('adm.estados.edit')
          ->with('estado', estado);
  }

  public function update(Request $request, $id)
  {
      $estado           = Estado::find($id);
      $estado->descripcion     = $request->descripcion;
      $estado->save();

      $estados = Estado::orderBy('id', 'ASC')->get();
      return view('adm.estados.index')
          ->with('estados', $estados);
  }

  public function destroy($id)
  {
      $estado = Estado::find($id);
      $estado->delete();
      return redirect()->route('estados.index');
  }
}
