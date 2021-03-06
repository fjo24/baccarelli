<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\User;
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
use App\Restriccion;
use App\Superficie;
use App\Flete;
use App\T_aplicado;
use Carbon\Carbon;

class EstadosController extends Controller
{

  public function accion_estados($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    //dd($pedido);
    $user = User::find(Auth()->user()->id);
    if ($pedido->estado_id == 1){
      //PAGINA DE PEDIDOS PENDIENTES, QUE SE PUEDEN PASAR A NO APROBADO O A APROBADO
      return redirect()->route('pendiente', $pedido->id);
    }elseif ($pedido->estado_id == 14) {
      //PAGINA DE ORDEN DE COMPRA, PARA ADJUNTAR LA OC AL SISTEMA
      return view('tienda.estados.ordencompra', compact('pedido', 'activo', 'user'));

      //no activos:
    }elseif ($pedido->estado_id == 4) {
      //PAGINA DE DESCARGA DE ARCHIVOS PARA REVISION ORDEN DE COMPRA Y PEDIDO
      return view('admin.estados.revisionoc', compact('pedido', 'activo'));
    }elseif ($pedido->estado_id == 5) {
      //PAGINA ENVIA A EDICION DE PEDIDO
      return view('pedidosadmin.edit', compact('pedido', 'activo'));
    }elseif ($pedido->estado_id == 6) {
      //PAGINA DE ORDEN DE COMPRA, PARA ADJUNTAR LA OC AL SISTEMA
      return view('tienda.estados.revisioncorreccion', compact('pedido', 'activo', 'user'));
    }elseif ($pedido->estado_id == 7) {
      //PAGINA DE FACTURA, PARA ADJUNTAR LA FACTURA AL SISTEMA
    //  dd($user->id);
      return view('admin.estados.factura', compact('pedido', 'activo', 'user'));
    }elseif ($pedido->estado_id == 8) {
      //PAGINA DE FACTURA, PARA ADJUNTAR LA FACTURA AL SISTEMA
    //  dd($user->id);
      return view('admin.estados.revisionstock', compact('pedido', 'activo', 'user'));
    }elseif ($pedido->estado_id == 9) {
      //PAGINA DE FACTURA, PARA ADJUNTAR LA FACTURA AL SISTEMA
    //  dd($user->id);
      return view('admin.estados.revisionmedicion', compact('pedido', 'activo', 'user'));
    }elseif ($pedido->estado_id == 10) {
      //PAGINA DE FACTURA, PARA ADJUNTAR LA FACTURA AL SISTEMA
    //  dd($user->id);
      return view('admin.estados.listoparamedir', compact('pedido', 'activo', 'user'));
    }
  }////***************************** FALTA SEGURIDAD ENTRADA DE USUARIOS
  public function pendiente($id)
  {
  $activo        = 'p';
  $pedido = Pedido::Find($id);
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
  return view('admin.estados.pendiente', compact('activo', 'requeridas',
  'restricciones', 'fecha', 'lista', 'num_pre', 'horarios', 'dias',
  'user', 'superficies', 'products', 'prod', 'config', 'especiales',
  'materiales', 'observaciones', 'bordes', 'aplicados', 'contenido',
  'localidades', 'flete', 'pedido'));
}

//PASAR PEDIDO A FALTA DOCUMENTACION
public function doc_insuficiente($id)
{
  $activo = 'pedidos';
  $pedido = Pedido::Find($id);
  $pedido->estado_id = 3;
  $pedido->update();
  if (Auth()->user()->nivel == 'administrador') {
    return redirect()->route('baccarelli.presupuestos');
  }else{
    return redirect()->route('tienda.presupuestos');
  }
}
  //PASAR PEDIDO A NO APROBADO
  public function noaprobado($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 2;
    $pedido->update();
    if (Auth()->user()->nivel == 'administrador') {
      return redirect()->route('baccarelli.presupuestos');
    }else{
      return redirect()->route('tienda.presupuestos');
    }
  }
  //ACCION DE APROBAR PEDIDO
  public function aprobado($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 14;
    $pedido->update();
    return redirect()->route('baccarelli.presupuestos', 'activo');
  }
  //ACCION DE GUARDAR ORDEN
  public function guardarorden(Request $request, $id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    if ($request->hasFile('ordencompra')) {
      if ($request->file('ordencompra')->isValid()) {
        $file = $request->file('ordencompra');
        $path = public_path('ordencompra/');
        $request->file('ordencompra')->move($path, $id . '_' . $file->getClientOriginalName());
        $pedido->ordencompra = 'ordencompra/' . $id . '_' . $file->getClientOriginalName();
      }
    }
    $pedido->estado_id=4;
    $pedido->save();
    return redirect()->route('pedidostienda.index');
  }

//estados eliminados=


  //ACCION DE GUARDAR ORDEN
  public function guardarfactura(Request $request, $id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    if ($request->hasFile('factura')) {
            if ($request->file('factura')->isValid()) {
                $file = $request->file('factura');
                $path = public_path('factura/');
                $request->file('factura')->move($path, $id . '_' . $file->getClientOriginalName());
                $pedido->factura = 'factura/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $pedido->estado_id=8;
    $pedido->save();
    return redirect()->route('pedidosadmin.index');
  }

  //ACCION DE MARCAR QUE NO CONCUERDAN PLANO Y COTIZADOR
  public function concuerdan($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 7;
    $pedido->update();
    return redirect()->route('baccarelli.presupuestos', 'activo');
  }

  //ACCION DE MARCAR QUE NO CONCUERDAN PLANO Y COTIZADOR
  public function noconcuerdan($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 5;
    $pedido->update();
    return redirect()->route('pedidosadmin.index');
  }

  public function edicionhecha($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 6;
    $pedido->update();
    return redirect()->route('pedidosadmin.index');
  }

  public function revisionaprobada($id){
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 3;
    $pedido->update();
    return redirect()->route('accion_estados', $pedido->id);
  }

  public function stockdisponible($id){
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 9;
    $pedido->update();
    return redirect()->route('pedidosadmin.index');
  }

  public function requieremedicion($id){
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 10;
    $pedido->update();
    return redirect()->route('pedidosadmin.index');
  }

  public function listoparamedir($id){
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 11;
    $pedido->update();
    return redirect()->route('pedidosadmin.index');
  }

}
