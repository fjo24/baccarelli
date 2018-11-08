@extends('admin.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet" />
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet" />
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
    Editar pedido
    <div class="">
        <a class="right modal-trigger" href="{{route('pedidosadmin.update', $pedido->id)}}">
            <button class="boton_datos fondo_activo" style="cursor:pointer!important;">
                EDITAR PEDIDO
            </button>
        </a>
    </div>
</div>
@endsection
@section('js')
@endsection