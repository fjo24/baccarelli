@extends('admin.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet" />
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
  @include('layouts.pedido.tabla')
    <br><br>
    <div class="center">
        {!!Form::model($pedido, ['route'=>['guardarfactura',$pedido->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="col l12 s12 no-padding">
                <div class="col l6 s6 no-padding">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Factura de compra</span>
                            <input name="ordencompra" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="col l6 s6 no-padding">
                    <button class="boton btn-large left" name="action" type="submit">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')

@endsection
