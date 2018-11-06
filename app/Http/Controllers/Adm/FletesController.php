<?php

namespace App\Http\Controllers\Adm;

use App\Flete;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FletesController extends Controller
{
    public function create()
    {
        $flete = Flete::all()->first();
        return redirect()->route('fletes.edit', $flete->id);
    }

    public function edit($id)
    {
        $flete = Flete::find($id);
        return view('adm.fletes.edit', compact('flete'));
    }

    public function update(Request $request, $id)
    {
        $flete        = Flete::find($id);
        $flete->flete = $request->flete;
        $flete->colocacion = $request->colocacion;
        $flete->medicion = $request->medicion;
        $flete->update();
        return redirect()->route('inicio.adm');
    }
}
