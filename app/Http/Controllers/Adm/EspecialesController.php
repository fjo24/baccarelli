<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Especial;

class EspecialesController extends Controller
{
  public function index()
  {
      $especiales = Especial::orderBy('id', 'ASC')->get();
      return view('adm.especiales.index')
          ->with('especiales', $especiales);
  }

  public function create()
  {
      return view('adm.especiales.create');
  }

  public function store(Request $request)
  {
      $especial           = new Especial();
      $especial->descripcion     = $request->descripcion;
      $especial->save();

      $especiales = Especial::orderBy('id', 'ASC')->get();
      return view('adm.especiales.index')
          ->with('especiales', $especiales);
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      $especial = Especial::find($id);
      return view('adm.especiales.edit', compact('especial'));
  }

  public function update(Request $request, $id)
  {
      $especial           = Especial::find($id);
      $especial->descripcion     = $request->descripcion;
      $especial->save();

      $especiales = Especial::orderBy('id', 'ASC')->get();
      return view('adm.especiales.index')
          ->with('especiales', $especiales);
  }

  public function destroy($id)
  {
      $especial = Especial::find($id);
      $especial->delete();
      return redirect()->route('especiales.index');
  }
}
