<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nivel;

class NivelesController extends Controller
{

  public function index()
  {
      $niveles = Nivel::orderBy('id', 'ASC')->get();
      return view('adm.niveles.index')
          ->with('niveles', $niveles);
  }

  public function create()
  {
      $nivel = Nivel::all()->first();
  //    dd($nivel->nivel2c);
      return redirect()->route('niveles.edit', $nivel->id);
  }

  public function store(Request $request)
  {
      $nivel              = new Nivel();
      $nivel->nivel1a      = $request->nivel1a;
      $nivel->nivel1b = $request->nivel1b;
      $nivel->nivel1c = $request->nivel1c;
      $nivel->nivel2a      = $request->nivel2a;
      $nivel->nivel2b = $request->nivel2b;
      $nivel->nivel2c = $request->nivel2c;
      $nivel->nivel3a      = $request->nivel3a;
      $nivel->nivel3b = $request->nivel3b;
      $nivel->nivel3c = $request->nivel3c;
      $nivel->save();

      $niveles = Nivel::orderBy('id', 'ASC')->get();
      return view('adm.niveles.index')
          ->with('niveles', $niveles);
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      $nivel = Nivel::find($id);
      return view('adm.niveles.edit')->with('nivel', $nivel);
  }

  public function update(Request $request, $id)
  {
      $nivel              = Nivel::find($id);
      $nivel->nivel1a = $request->nivel1a;
      $nivel->nivel1b = $request->nivel1b;
      $nivel->nivel1c = $request->nivel1c;
      $nivel->nivel2a = $request->nivel2a;
      $nivel->nivel2b = $request->nivel2b;
      $nivel->nivel2c = $request->nivel2c;
      $nivel->nivel3a = $request->nivel3a;
      $nivel->nivel3b = $request->nivel3b;
      $nivel->nivel3c = $request->nivel3c;
      $nivel->save();

      $niveles = Nivel::orderBy('id', 'ASC')->get();
      return redirect()->route('niveles.create');
  }

  public function destroy($id)
  {
      $nivel = Nivel::find($id);
      $nivel->delete();
      return redirect()->route('niveles.index');
  }
}
