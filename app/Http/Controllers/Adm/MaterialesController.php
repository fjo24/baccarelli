<?php

namespace App\Http\Controllers\Adm;

use App\Descuento;
use App\Dolar;
use App\Http\Controllers\Controller;
use App\Material;
use App\Observacion;
use App\Rubro;
use App\Stock;
use App\Unidad;
//use Maatwebsite\Excel\Facades\Excel;
use Excel;
use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    public function index()
    {
        $dolar      = Dolar::all()->first();
        $materiales = Material::orderBy('rubro_id', 'ASC')->get();
        return view('adm.materiales.index', compact('materiales', 'dolar'));
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
        $material                   = Material::find($id);
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
        ini_set('max_execution_time', 0);

        \Excel::load($request->excel, function ($reader) {

            $excel = $reader->get();

            // iteracción
            $dolar  = Dolar::all()->first();
            $cambio = 'fr_' . time();
            $reader->each(function ($row) use ($cambio, $dolar) {
                //  $cate_ref = Material::Find($row->id);
                $cate_ref = Material::Where('codigo', $row->codigo)->first();
                if (!isset($cate_ref)) {
                    if ($row->moneda == '$' || $row->moneda == 'U$S') {
                        # code...
                        $categoria = new Material;
                        //   $categoria->id = $row->id;
                        $categoria->codigo      = $row->codigo;
                        $categoria->nombre      = $row->nombre;
                        $categoria->moneda      = $row->moneda;
                        $categoria->unidad      = $row->unidad;
                        $categoria->observacion = $row->observaciones;
                        if ($row->moneda == 'U$S') {
                            $categoria->precio_dolar = $row->precio;
                            $categoria->cost_dolar   = $row->precio_dto;
                            $categoria->precio       = number_format($row->precio * $dolar->valor, 2, ',', '');
                            $categoria->cost         = number_format($row->precio_dto * $dolar->valor, 2, ',', '');
                        } else {
                            $categoria->precio_dolar = null;
                            $categoria->cost_dolar   = null;
                            $categoria->precio       = number_format($row->precio, 2, ',', '');
                            $categoria->cost         = number_format($row->precio_dto, 2, ',', '');
                        }
                        if (starts_with($row->nombre, 'GTO') == true) {
                            $categoria->rubro_id = 1;
                        }
                        if (starts_with($row->nombre, 'M. ') == true) {
                            $categoria->rubro_id = 2;
                        }
                        if (starts_with($row->nombre, 'TRAVERTINO') == true) {
                            $categoria->rubro_id = 3;
                        }
                        if (starts_with($row->nombre, 'CUARCITA') == true) {
                            $categoria->rubro_id = 4;
                        }
                        if (starts_with($row->nombre, 'SILESTONE') == true) {
                            $categoria->rubro_id = 5;
                        }
                        if (starts_with($row->nombre, 'NEOLITH') == true) {
                            $categoria->rubro_id = 6;
                        }

                        $categoria->numero_cambio = $cambio;
                        //dd($categoria->numero_cambio);
                        $categoria->save();
                    }
                } else {
                    if ($row->moneda == '$' || $row->moneda == 'U$S') {
                        //      $cate_ref->id = $row->id;
                        $cate_ref->codigo      = $row->codigo;
                        $cate_ref->nombre      = $row->nombre;
                        $cate_ref->moneda      = $row->moneda;
                        $cate_ref->precio      = $row->precio;
                        $cate_ref->unidad      = $row->unidad;
                        $cate_ref->observacion = $row->observaciones;
                        if (starts_with($row->nombre, 'GTO') == true) {
                            $cate_ref->rubro_id = 1;
                        }
                        if (starts_with($row->nombre, 'M. ') == true) {
                            $cate_ref->rubro_id = 2;
                        }
                        if (starts_with($row->nombre, 'TRAVERTINO') == true) {
                            $cate_ref->rubro_id = 3;
                        }
                        if (starts_with($row->nombre, 'CUARCITA') == true) {
                            $cate_ref->rubro_id = 4;
                        }
                        if (starts_with($row->nombre, 'SILESTONE') == true) {
                            $cate_ref->rubro_id = 5;
                        }
                        if (starts_with($row->nombre, 'NEOLITH') == true) {
                            $cate_ref->rubro_id = 6;
                        }
                        if ($row->moneda == 'U$S') {
                            $cate_ref->precio_dolar = $row->precio;
                            $cate_ref->cost_dolar   = $row->precio_dto;
                            $cate_ref->precio       = number_format($row->precio * $dolar->valor, 2, ',', '.');
                            $cate_ref->cost         = number_format($row->precio_dto * $dolar->valor, 2, ',', '.');
                        } else {
                            $cate_ref->precio_dolar = null;
                            $cate_ref->cost_dolar   = null;
                            $cate_ref->precio       = number_format($row->precio, 2, ',', '.');
                            $cate_ref->cost         = number_format($row->precio_dto, 2, ',', '.');
                        }
                        $cate_ref->numero_cambio = $cambio;
                        $cate_ref->update();
                    }
                }
            });

            $materiales = Material::OrderBy('codigo', 'ASC')->get();
            foreach ($materiales as $material) {
                if ($material->numero_cambio != $cambio) {
                    $material->delete();
                }
            }
        });

        return redirect()->route('materiales.index');
    }
}
