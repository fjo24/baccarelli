<?php

namespace App\Http\Controllers\Adm_tienda;

use Illuminate\Http\Request;
use App\Tienda;
use App\Http\Controllers\Controller;

class TiendasController extends Controller
{
	public function create()
    {
        $idtienda = Auth()->user()->tienda_id;
        $tienda = Tienda::Where('id', $idtienda)->first();
        return redirect()->route('admintiendas.edit', $tienda->id);
    }

    public function edit($id)
    {
        $tienda = Tienda::find($id);
        return view('adm_tienda.tiendas.edit')
            ->with('tienda', $tienda);
    }

    public function update(Request $request, $id)
    {
        $tienda = Tienda::find($id);

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/tienda/');
                $request->file('logo')->move($path, $id . '_' . $file->getClientOriginalName());
                $tienda->logo = 'img/tienda/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $tienda->update();

        return view('adm_tienda.dashboard');
    }
}
