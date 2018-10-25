<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unidad;

class UnidadesController extends Controller
{
    public function index()
    {
        $unidades = Unidad::orderBy('nombre', 'ASC')->get();
        return view('adm.unidades.index', compact('unidades'));
    }

    public function create()
    {
        $unidades = Unidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.unidades.create', compact('unidades'));
    }

    public function store(Request $request)
    {

        $unidad              = new Unidad();
        $unidad->nombre      = $request->nombre;
        $unidad->save();
        return redirect()->route('unidades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad  = Unidad::find($id);
        return view('adm.unidades.edit', compact('unidad'));
    }

    public function update(Request $request, $id)
    {
        $unidad = Unidad::find($id);
        $unidad->nombre = $request->nombre;
        $unidad->save();
        return redirect()->route('unidades.index');
    }

    public function destroy($id)
    {
        $unidad = Unidad::find($id);
        $unidad->delete();
        return redirect()->route('unidades.index');
    }
}
