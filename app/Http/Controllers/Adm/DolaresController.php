<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dolar;
use App\Material;

class DolaresController extends Controller
{
    public function create()
    {
        $dolar = Dolar::all()->first();
        return redirect()->route('dolares.edit', $dolar->id);
    }

    public function edit($id)
    {
        $dolar = Dolar::find($id);
        return view('adm.dolares.edit', compact('dolar'));
    }

    public function update(Request $request, $id)
    {
        $dolar              = Dolar::find($id);
        $dolar->valor      = $request->valor;

        $dolar->update();
        $materiales = Material::OrderBy('nombre', 'ASC')->get();
        foreach ($materiales as $material) {
        	if ($material->precio_dolar!=null) {
        		$material->precio = $material->precio_dolar*$dolar->valor;
        		$material->cost = $material->cost_dolar*$dolar->valor;
        		$material->update();
        	}
        }

        return redirect()->route('materiales.index');
    }
}
