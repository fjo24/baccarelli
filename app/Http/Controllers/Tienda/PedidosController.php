<?php

namespace App\Http\Controllers\Tienda;

use App\Borde;
use App\Contenido_observacion;
use App\Drequerida;
use App\Entrega_dia;
use App\Entrega_horario;
use App\Http\Controllers\Controller;
use App\Localidad;
use App\Material;
use App\Observacion;
use App\Pedido;
use App\Restriccion;
use App\Superficie;
use App\T_aplicado;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activo        = 'presupuestos';
        $fecha         = Carbon::now()->format('d/m/Y');
        $lista         = 1.2;
        $num_pre       = 29;
        $user          = User::find(Auth()->user()->id);
        $horarios      = Entrega_horario::OrderBy('id', 'ASC')->get();
        $dias          = Entrega_dia::OrderBy('id', 'ASC')->get();
        $restricciones = Restriccion::OrderBy('id', 'ASC')->get();
        $requeridas    = Drequerida::OrderBy('id', 'ASC')->get();
        $observaciones = Observacion::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
        $superficies   = Superficie::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
        $aplicados     = T_aplicado::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
        $bordes        = Borde::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
        $superficies   = Superficie::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
        $materiales    = Material::OrderBy('id', 'ASC')->pluck('nombre', 'id')->all();
        $localidades   = Localidad::OrderBy('id', 'ASC')->pluck('nombre', 'id')->all();
        $contenido     = Contenido_observacion::all()->first();
        $aux           = Material::orderBy('nombre', 'ASC')->get();
        $prod          = $aux->toJson();
        $config        = 1;
        $products      = Superficie::orderBy('id', 'DESC')->get();
        return view('tienda.pedidos.create', compact('activo', 'requeridas', 'restricciones', 'fecha', 'lista', 'num_pre', 'horarios', 'dias', 'user', 'superficies', 'products', 'prod', 'config', 'materiales', 'observaciones', 'bordes', 'aplicados', 'contenido', 'localidades'));

    }

    public function store(Request $request)
    {
        $pedido                     = new Pedido();
        $pedido->fecha              = Carbon::now()->format('Y-m-d');
        $pedido->numero_presupuesto = $request->numero_presupuesto;
        $pedido->numero_proyecto    = $request->numero_proyecto;
        $pedido->nombre_cliente     = $request->nombre_cliente;
        $pedido->apellido_cliente   = $request->apellido_cliente;
        $pedido->localidad          = $request->localidad;
        $pedido->telefono1          = $request->telefono1;
        $pedido->telefono2          = $request->telefono2;
        $pedido->telefono3          = $request->telefono3;
        $pedido->encargado          = $request->encargado;
        $pedido->telefono_encargado = $request->telefono_encargado;
        $pedido->aclaracion         = $request->aclaracion;
        $pedido->listado_id         = $request->listado_id;
        $pedido->user_id            = Auth()->user()->id;
        $pedido->save();
        $pedido->EntregaHorarios()->sync($request->get('horario_id'));
        $pedido->EntregaDias()->sync($request->get('dia_id'));
        $y = 0;
        $q = 0;
        if (isset($request->restriccion_id)) {
            foreach ($request->restriccion_id as $i => $value) {
                foreach ($request->especificacion as $z => $value2) {
                    if ($value == $z + 1) {
                        $pedido->Restricciones()->attach($value, ['especificacion' => $value2]);
                    }
                }
            }
        }
        if (isset($request->requerida_id)) {
            foreach ($request->requerida_id as $i => $value) {
                foreach ($request->drequerida as $z => $value2) {
                    if ($value == $z + 1) {
                        $pedido->Drequerida()->attach($value, ['especificacion' => $value2]);
                    }
                }
            }
        }
        for ($i = 0; $i < count($request->superficie_id); $i++) {
            $pedido->materiales()->attach($request->material_id[$i], ['superficie_id' => $request->superficie_id[$i], 'costo' => $request->quantity[$i]]);
        }

        if (Auth()->user()->nivel == 'administrador') {
            return redirect()->route('tienda.presupuestos');
        } else {
            return redirect()->route('tienda.presupuestos');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
