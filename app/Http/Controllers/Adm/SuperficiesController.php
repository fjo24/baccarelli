<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Superficie;

class SuperficiesController extends Controller
{
    public function index()
    {
        $superficies = Superficie::orderBy('id', 'ASC')->get();
        return view('adm.superficies.index')
            ->with('superficies', $superficies);
    }

    public function create()
    {
        return view('adm.superficies.create');
    }

    public function store(Request $request)
    {
        $superficie           = new Superficie();
        $superficie->descripcion     = $request->descripcion;
        $superficie->costo     = $request->costo;
        $superficie->save();

        $superficies = Superficie::orderBy('id', 'ASC')->get();
        return view('adm.superficies.index')
            ->with('superficies', $superficies);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $superficie = Superficie::find($id);
        return view('adm.superficies.edit')
            ->with('superficie', $superficie);
    }

    public function update(Request $request, $id)
    {
        $superficie           = Superficie::find($id);
        $superficie->descripcion     = $request->descripcion;
        $superficie->costo     = $request->costo;
        $superficie->save();

        $superficies = Superficie::orderBy('id', 'ASC')->get();
        return view('adm.superficies.index')
            ->with('superficies', $superficies);
    }

    public function destroy($id)
    {
        $superficie = Superficie::find($id);
        $superficie->delete();
        return redirect()->route('superficies.index');
    }
}
