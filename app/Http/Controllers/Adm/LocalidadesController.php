<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Localidad;
use Excel;
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

    public function excel()
    {
        return view('adm.localidades.carga');
    }

    public function import(Request $request)
    {
      //dd($request->excel);
        ini_set('max_execution_time', 0);

        \Excel::load($request->excel, function ($reader) {
            $excel = $reader->get();
//dd($reader);
            // iteracción
            $cambio = 'fr_' . time();
            $reader->each(function ($row) use ($cambio) {
              //dd($row);
                  $localidad = Localidad::Where('nombre', $row->horas_flete)->first();
                  if (isset($localidad)) {
                    $localidad->nombre = $row->localidad;
                    $localidad->horas_flete = $row->horas_flete;
                    $localidad->horas_peaje = $row->horas_peaje;
                    if (starts_with($row->localidad, 'CF') == true) {
                        $localidad->zona = 'capital federal';
                    }else{
                      $localidad->zona = 'gran buenos aires';
                    }
                    $localidad->save();
                }else{
                  $localidad = new Localidad;
                  $localidad->nombre = $row->localidad;
                  $localidad->horas_flete = $row->horas_flete;
                  $localidad->horas_peaje = $row->horas_peaje;
                  if (starts_with($row->localidad, 'CF') == true) {
                      $localidad->zona = 'capital federal';
                  }else{
                    $localidad->zona = 'gran buenos aires';
                  }
                  $localidad->save();
                }
              });

    });
    return redirect()->route('localidades.index');
  }
}
