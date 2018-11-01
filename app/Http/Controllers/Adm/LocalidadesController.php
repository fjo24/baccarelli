<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Localidad;
use Illuminate\Http\Request;

class LocalidadesController extends Controller
{
    public function index()
    {
        $localidades = Localidad::orderBy('id', 'ASC')->get();
        return view('adm.localidades.index')
            ->with('localidades', $localidades);
    }

    public function create()
    {
        return view('adm.localidades.create');
    }

    public function store(Request $request)
    {
        $localidad              = new Localidad();
        $localidad->nombre      = $request->nombre;
        $localidad->horas_flete = $request->horas_flete;
        $localidad->horas_peaje = $request->horas_peaje;
        $localidad->save();

        $localidades = Localidad::orderBy('id', 'ASC')->get();
        return view('adm.localidades.index')
            ->with('localidades', $localidades);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $localidad = Localidad::find($id);
        return view('adm.localidades.edit')
            ->with('localidad', $localidad);
    }

    public function update(Request $request, $id)
    {
        $localidad              = Localidad::find($id);
        $localidad->nombre      = $request->nombre;
        $localidad->horas_flete = $request->horas_flete;
        $localidad->horas_peaje = $request->horas_peaje;
        $localidad->save();

        $localidades = Localidad::orderBy('id', 'ASC')->get();
        return view('adm.localidades.index')
            ->with('localidades', $localidades);
    }

    public function destroy($id)
    {
        $localidad = Localidad::find($id);
        $localidad->delete();
        return redirect()->route('localidades.index');
    }
}
