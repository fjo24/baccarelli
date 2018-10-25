<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adicional;

class AdicionalesController extends Controller
{
    public function index()
    {
        $adicionales = Adicional::orderBy('id', 'ASC')->get();
        return view('adm.adicionales.index')
            ->with('adicionales', $adicionales);
    }

    public function create()
    {
        return view('adm.adicionales.create');
    }

    public function store(Request $request)
    {
        $adicional           = new Adicional();
        $adicional->descripcion     = $request->descripcion;
        $adicional->save();

        $adicionales = Adicional::orderBy('id', 'ASC')->get();
        return view('adm.adicionales.index')
            ->with('adicionales', $adicionales);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $adicional = Adicional::find($id);
        return view('adm.adicionales.edit')
            ->with('adicional', $adicional);
    }

    public function update(Request $request, $id)
    {
        $adicional           = Adicional::find($id);
        $adicional->descripcion     = $request->descripcion;
        $adicional->save();

        $adicionales = Adicional::orderBy('id', 'ASC')->get();
        return view('adm.adicionales.index')
            ->with('adicionales', $adicionales);
    }

    public function destroy($id)
    {
        $adicional = Adicional::find($id);
        $adicional->delete();
        return redirect()->route('adicionales.index');
    }
}
