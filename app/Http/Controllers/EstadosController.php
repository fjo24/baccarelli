<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\User;

class EstadosController extends Controller
{

  public function accion_estados($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $user = User::find(Auth()->user()->id);
    if ($pedido->estado_id == 1){
      //PAGINA DE PEDIDOS PENDIENTES, QUE SE PUEDEN PASAR A NO APROBADO O A APROBADO
      return view('admin.estados.pendiente', compact('pedido', 'activo'));
    }elseif ($pedido->estado_id == 4) {
      //PAGINA DE DESCARGA DE ARCHIVOS PARA REVISION ORDEN DE COMPRA Y PEDIDO
      return view('admin.estados.revisionoc', compact('pedido', 'activo'));
    }elseif ($pedido->estado_id == 5) {
      //PAGINA ENVIA A EDICION DE PEDIDO
      return view('pedidosadmin.edit', compact('pedido', 'activo'));
    }elseif ($pedido->estado_id == 3) {
      //PAGINA DE ORDEN DE COMPRA, PARA ADJUNTAR LA OC AL SISTEMA
      return view('tienda.estados.ordencompra', compact('pedido', 'activo', 'user'));
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
    $pedido->estado_id = 3;
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
