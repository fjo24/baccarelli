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
use App\Especial;
use App\Pedido;
use App\Restriccion;
use App\Superficie;
use App\Flete;
use App\T_aplicado;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function presupuestos()
    {
        $user = User::find(Auth()->user()->id);
        $activo = 'presupuestos';
        $pedidos = Pedido::orderBy('id', 'ASC')->Where('user_id', $user->id)->Where('estado_id', 13)->get();
        return view('tienda.pedidos.presupuestos', compact('user', 'pedidos', 'superficies', 'activo'));
    }

    public function index()
    {
      $user = User::find(Auth()->user()->id);
      $pedidos = Pedido::orderBy('id', 'ASC')->Where('user_id', $user->id)->where('estado_id', '<>', 13)->get();
      $activo = 'pedidos';
      return view('tienda.pedidos.index', compact('user', 'pedidos', 'superficies', 'activo'));
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
         $especiales    = Especial::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
         $aplicados     = T_aplicado::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
         $bordes        = Borde::OrderBy('id', 'ASC')->pluck('descripcion', 'id')->all();
         $superficies   = Superficie::OrderBy('id', 'ASC')->get();
         $materiales    = Material::OrderBy('id', 'ASC')->pluck('nombre', 'id')->all();
         $contenido     = Contenido_observacion::all()->first();
         $aux           = Material::orderBy('nombre', 'ASC')->get();
         $localidades   = Localidad::orderBy('id', 'ASC')->get();
         $flete         = Flete::first();
         $prod          = $aux->toJson();
         $config        = 1;
         $products      = Superficie::orderBy('id', 'DESC')->get();
         return view('tienda.pedidos.create', compact('activo', 'requeridas',
         'restricciones', 'fecha', 'lista', 'num_pre', 'horarios', 'dias',
         'user', 'superficies', 'products', 'prod', 'config', 'especiales',
         'materiales', 'observaciones', 'bordes', 'aplicados', 'contenido',
         'localidades', 'flete'));

     }

    public function store(Request $request)
    {
  //    dd($request);
        $pedido                     = new Pedido();
        $pedido->fecha              = Carbon::now()->format('Y-m-d');
        $pedido->numero_presupuesto = $request->numero_presupuesto;
        $pedido->numero_proyecto    = $request->numero_proyecto;
        $pedido->nombre_cliente     = $request->nombre_cliente;
        $pedido->apellido_cliente   = $request->apellido_cliente;
        $pedido->telefono1          = $request->telefono1;
        $pedido->telefono2          = $request->telefono2;
        $pedido->telefono3          = $request->telefono3;
        $pedido->encargado          = $request->encargado;
        $pedido->telefono_encargado = $request->telefono_encargado;
        $pedido->aclaracion         = $request->aclaracion;
        $pedido->listado_id         = $request->listado_id;
        $pedido->localidad         = $request->localidad_id;
        $pedido->user_id            = Auth()->user()->id;
        $pedido->estado_id         = 1;
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
if(isset($request->material_id)){
  //dd($request->material_id);
        for ($i = 0; $i < count($request->superficie_id)-1; $i++) {
            $mate = Material::Find($request->material_id[$i]);

            $cuadrados = $request->largo[$i]*$request->ancho[$i];
            $cuad   = str_replace(',', '', $cuadrados);
            $matecos = str_replace(',', '', $mate->cost);
            $c = $cuad*$matecos;
          //  dd('llego');


            $pedido->Materiales()->attach($request->material_id[$i], [
            'superficie_id' => $request->superficie_id[$i],
            'largo' => $request->largo[$i],
            'ancho' => $request->ancho[$i],
            'metros_cuadrados' => $request->largo[$i]*$request->ancho[$i],
            'costo' => $c,
            'costo_adicional' => $request->adicional[$i]
          ]);
        }
}
        if(isset($request->borde_id)){
        for ($i = 0; $i < count($request->borde_id); $i++) {
          $borde = Borde::Find($request->borde_id[$i]);
          //if (isset($borde)) {
          if (isset($borde)){

            $p = str_replace(',', '', $borde->precio);
            $l = str_replace(',', '', $request->largo_terminacion[$i]);
            $c = $p*$l;
          }
        //  dd($request);
            $pedido->Bordes()->attach($request->borde_id[$i],[
            'largo' => $request->largo_terminacion[$i],
            'monto' => $c
          ]);
        }
        //}
      }

        if (Auth()->user()->nivel == 'administrador') {
            return redirect()->route('tienda.presupuestos');
        } else {
            return redirect()->route('tienda.presupuestos');
        }

    }

    public function createpresupuesto(Request $request)
    {
  //    dd($request);
        $pedido                     = new Pedido();
        $pedido->fecha              = Carbon::now()->format('Y-m-d');
        $pedido->numero_presupuesto = $request->numero_presupuesto;
        $pedido->numero_proyecto    = $request->numero_proyecto;
        $pedido->nombre_cliente     = $request->nombre_cliente;
        $pedido->apellido_cliente   = $request->apellido_cliente;
        $pedido->telefono1          = $request->telefono1;
        $pedido->telefono2          = $request->telefono2;
        $pedido->telefono3          = $request->telefono3;
        $pedido->encargado          = $request->encargado;
        $pedido->telefono_encargado = $request->telefono_encargado;
        $pedido->aclaracion         = $request->aclaracion;
        $pedido->listado_id         = $request->listado_id;
        $pedido->localidad         = $request->localidad_id;
        $pedido->user_id            = Auth()->user()->id;
        $pedido->estado_id         = 13;
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
if(isset($request->material_id)){
  //dd($request->material_id);
        for ($i = 0; $i < count($request->superficie_id)-1; $i++) {
            $mate = Material::Find($request->material_id[$i]);

            $cuadrados = $request->largo[$i]*$request->ancho[$i];
            $cuad   = str_replace(',', '', $cuadrados);
            $matecos = str_replace(',', '', $mate->cost);
            $c = $cuad*$matecos;
          //  dd('llego');


            $pedido->Materiales()->attach($request->material_id[$i], [
            'superficie_id' => $request->superficie_id[$i],
            'largo' => $request->largo[$i],
            'ancho' => $request->ancho[$i],
            'metros_cuadrados' => $request->largo[$i]*$request->ancho[$i],
            'costo' => $c,
            'costo_adicional' => $request->adicional[$i]
          ]);
        }
}
        if(isset($request->borde_id)){
        for ($i = 0; $i < count($request->borde_id); $i++) {
          $borde = Borde::Find($request->borde_id[$i]);
          //if (isset($borde)) {
          if (isset($borde)){

            $p = str_replace(',', '', $borde->precio);
            $l = str_replace(',', '', $request->largo_terminacion[$i]);
            $c = $p*$l;
          }
        //  dd($request);
            $pedido->Bordes()->attach($request->borde_id[$i],[
            'largo' => $request->largo_terminacion[$i],
            'monto' => $c
          ]);
        }
        //}
      }

        if (Auth()->user()->nivel == 'administrador') {
            return redirect()->route('tienda.presupuestos');
        } else {
            return redirect()->route('tienda.presupuestos');
        }

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
