<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Borde;

class BordesController extends Controller
{
    public function index()
    {
        $bordes = Borde::orderBy('id', 'ASC')->get();
        return view('adm.bordes.index')
            ->with('bordes', $bordes);
    }

    public function create()
    {
        return view('adm.bordes.create');
    }

    public function store(Request $request)
    {
        $borde           = new Borde();
        $borde->descripcion     = $request->descripcion;
        $borde->precio       = $request->precio;
        $borde->save();

        $bordes = Borde::orderBy('id', 'ASC')->get();
        return view('adm.bordes.index')
            ->with('bordes', $bordes);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $borde = Borde::find($id);
        return view('adm.bordes.edit', compact('borde'));
    }

    public function update(Request $request, $id)
    {
        $borde           = Borde::find($id);
        $borde->descripcion     = $request->descripcion;
        $borde->precio       = $request->precio;
        $borde->save();

        $bordes = Borde::orderBy('id', 'ASC')->get();
        return view('adm.bordes.index')
            ->with('bordes', $bordes);
    }

    public function destroy($id)
    {
        $borde = Borde::find($id);
        $borde->delete();
        return redirect()->route('bordes.index');
    }
}
