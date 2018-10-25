<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class StocksController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('id', 'ASC')->get();
        return view('adm.stocks.index')
            ->with('stocks', $stocks);
    }

    public function create()
    {
        return view('adm.stocks.create');
    }

    public function store(Request $request)
    {
        $stock           = new Stock();
        $stock->descripcion     = $request->descripcion;
        $stock->save();

        $stocks = Stock::orderBy('id', 'ASC')->get();
        return view('adm.stocks.index')
            ->with('stocks', $stocks);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('adm.stocks.edit')
            ->with('stock', $stock);
    }

    public function update(Request $request, $id)
    {
        $stock           = Stock::find($id);
        $stock->descripcion     = $request->descripcion;
        $stock->save();

        $stocks = Stock::orderBy('id', 'ASC')->get();
        return view('adm.stocks.index')
            ->with('stocks', $stocks);
    }

    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}
