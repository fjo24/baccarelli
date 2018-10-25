<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rubro;

class RubrosController extends Controller
{
    public function index()
    {
        $rubros = Rubro::orderBy('nombre', 'ASC')->get();
        return view('adm.rubros.index', compact('rubros'));
    }

    public function create()
    {
        $rubros = Rubro::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.rubros.create', compact('rubros'));
    }

    public function store(Request $request)
    {

        $rubro              = new Rubro();
        $rubro->nombre      = $request->nombre;
        $rubro->save();
        return redirect()->route('rubros.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rubros = Rubro::orderBy('nombre', 'ASC')->where('id', '<>', $id)->pluck('nombre', 'id')->all();
        $rubro  = Rubro::find($id);
        return view('adm.rubros.edit', compact('rubro', 'rubros'));
    }

    public function update(Request $request, $id)
    {
        $rubro = Rubro::find($id);
        $rubro->nombre = $request->nombre;
        $rubro->save();
        return redirect()->route('rubros.index');
    }

    public function destroy($id)
    {
        $rubro = Rubro::find($id);
        $rubro->delete();
        return redirect()->route('rubros.index');
    }
//opcional: carga por excel
    public function excelcat()
    {
        return view('adm.rubros.carga', compact('rubros'));
    }
}
