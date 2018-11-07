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

}
