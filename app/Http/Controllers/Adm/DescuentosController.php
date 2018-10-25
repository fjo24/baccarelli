<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Descuento;

class DescuentosController extends Controller
{
    public function index()
    {
        $descuentos = Descuento::orderBy('id', 'ASC')->get();
        return view('adm.descuentos.index')
            ->with('descuentos', $descuentos);
    }

    public function create()
    {
        return view('adm.descuentos.create');
    }

    public function store(Request $request)
    {
        $descuento           = new Descuento();
        $descuento->porcentaje     = $request->porcentaje;
        $descuento->nombre     = $request->nombre;
        $descuento->save();

        $descuentos = Descuento::orderBy('id', 'ASC')->get();
        return view('adm.descuentos.index')
            ->with('descuentos', $descuentos);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $descuento = Descuento::find($id);
        return view('adm.descuentos.edit')
            ->with('descuento', $descuento);
    }

    public function update(Request $request, $id)
    {
        $descuento           = Descuento::find($id);
        $descuento->porcentaje     = $request->porcentaje;
        $descuento->nombre     = $request->nombre;
        $descuento->save();

        $descuentos = Descuento::orderBy('id', 'ASC')->get();
        return view('adm.descuentos.index')
            ->with('descuentos', $descuentos);
    }

    public function destroy($id)
    {
        $descuento = Descuento::find($id);
        $descuento->delete();
        return redirect()->route('descuentos.index');
    }
}
