<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class EstadosController extends Controller
{
  //PASAR PEDIDO A NO APROBADO
  public function noaprobado($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    $pedido->estado_id = 2;
    $pedido->update();
    return redirect()->route('baccarelli.presupuestos');
  }

  //PAGINA DE PEDIDOS PENDIENTES, QUE SE PUEDEN PASAR A NO APROBADO O A APROBADO
  public function pendiente($id)
  {
    $activo = 'presupuestos';
    $pedido = Pedido::Find($id);
    return view('admin.estados.pendiente', compact('pedido', 'activo'));
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

  //PAGINA DE ORDEN DE COMPRA, PARA ADJUNTAR LA OC AL SISTEMA
  public function ordencompra($id)
  {
    $activo = 'presupuestos';
    $pedido = Pedido::Find($id);
    return view('tienda.estados.ordencompra', compact('pedido', 'activo'));
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

  //PAGINA DE DESCARGA DE ARCHIVOS PARA REVISION ORDEN DE COMPRA Y PEDIDO
  public function revisionoc($id)
  {
    $activo = 'pedidos';
    $pedido = Pedido::Find($id);
    return view('admin.estados.revisionoc', compact('pedido', 'activo'));
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
}
