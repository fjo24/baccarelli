<?php

namespace App\Http\Controllers\Adm;

use App\Descuento;
use App\Http\Controllers\Controller;
use App\Material;
use App\Unidad;
use App\Observacion;
use App\Rubro;
use App\Stock;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Input;
use DB;
use Excel;
class MaterialesController extends Controller
{
    public function index()
    {
        $materiales = Material::orderBy('nombre', 'ASC')->get();
        return view('adm.materiales.index', compact('materiales'));
    }

    public function create()
    {
        $observaciones = Observacion::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id')->all();
        $stock         = Stock::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id')->all();
        $descuentos    = Descuento::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $rubros        = Rubro::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.materiales.create', compact('rubros', 'descuentos', 'stock', 'observaciones'));
    }

    public function store(Request $request)
    {

        $material                   = new Material();
        $material->nombre           = $request->nombre;
        $material->espesor          = $request->espesor;
        $material->orden            = $request->orden;
        $material->codigo           = $request->codigo;
        $material->precio           = $request->precio;
        $material->precio_descuento = $request->precio_descuento;
        $material->leather          = $request->leather;
        $material->rp               = $request->rp;
        $material->diamantado       = $request->diamantado;
        $material->moneda           = $request->moneda;
        $material->rubro_id         = $request->rubro_id;
        $material->observacion_id   = $request->observacion_id;
        $material->stock_id         = $request->stock_id;
        $material->descuento_id     = $request->descuento_id;
        $material->save();

        return redirect()->route('materiales.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $observaciones = Observacion::orderBy('nombre', 'ASC')->pluck('descripcion', 'id')->all();
        $stock         = Stock::orderBy('descripcion', 'ASC')->pluck('nombre', 'id')->all();
        $descuentos    = Descuento::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $rubros        = Rubro::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.materiales.edit', compact('rubros', 'descuentos', 'stock', 'observaciones'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $material->nombre           = $request->nombre;
        $material->espesor          = $request->espesor;
        $material->orden            = $request->orden;
        $material->codigo           = $request->codigo;
        $material->precio           = $request->precio;
        $material->precio_descuento = $request->precio_descuento;
        $material->leather          = $request->leather;
        $material->rp               = $request->rp;
        $material->diamantado       = $request->diamantado;
        $material->moneda           = $request->moneda;
        $material->rubro_id         = $request->rubro_id;
        $material->observacion_id   = $request->observacion_id;
        $material->stock_id         = $request->stock_id;
        $material->descuento_id     = $request->descuento_id;
        $material->update();
        return redirect()->route('materiales.index');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();
        return redirect()->route('materiales.index');
    }

    public function excelcat()
    {
        return view('adm.materiales.carga');
    }

    public function importCat(Request $request)
    {


        \Excel::load($request->excel, function($reader) {

        $excel = $reader->get();

        // iteracción
        $cambio = 'fr_' . time();
        $reader->each(function($row) use ($cambio){
          //  $cate_ref = Material::Find($row->id);
            $cate_ref = Material::Where('codigo', $row->codigo)->first();
            if(!isset($cate_ref)){
                if ($row->moneda=='$'||$row->moneda=='U$S') {
                    # code...
                $categoria = new Material;
             //   $categoria->id = $row->id;
                $categoria->codigo = $row->codigo;
                $categoria->nombre = $row->nombre;
                $categoria->moneda = $row->moneda;
                if ($row->moneda=='U$S') {
                    $cate_ref->precio_dolar = $row->precio;
                    $cate_ref->cost_dolar = $row->precio_dto;
                    $cate_ref->precio = $row->precio*37;
                    $cate_ref->cost = $row->precio_dto*37;
                }else{
                    $cate_ref->precio_dolar = null;
                    $cate_ref->cost_dolar = null;
                    $cate_ref->precio = $row->precio;
                    $cate_ref->cost = $row->precio_dto;
                }
                $categoria->numero_cambio = $cambio;
                //dd($categoria->numero_cambio);
                $categoria->save();
                }
            }else{
if ($row->moneda=='$'||$row->moneda=='U$S') {
          //      $cate_ref->id = $row->id;
                $cate_ref->codigo = $row->codigo;
                $cate_ref->nombre = $row->nombre;
                $cate_ref->moneda = $row->moneda;
                $cate_ref->precio = $row->precio;
                if ($row->moneda=='U$S') {
                    $cate_ref->precio_dolar = $row->precio;
                    $cate_ref->cost_dolar = $row->precio_dto;
                    $cate_ref->precio = $row->precio*37;
                    $cate_ref->cost = $row->precio_dto*37;
                }else{
                    $cate_ref->precio_dolar = null;
                    $cate_ref->cost_dolar = null;
                    $cate_ref->precio = $row->precio;
                    $cate_ref->cost = $row->precio_dto;
                }
                $cate_ref->numero_cambio = $cambio;
                $cate_ref->update();
            }
            }
        });
        $materiales = Material::OrderBy('codigo', 'ASC')->get();
        foreach ($materiales as $material) {
            if ($material->numero_cambio!=$cambio) {
                $material->delete();
            }
        }
    });
        
        return redirect()->route('materiales.index');
    }
}
