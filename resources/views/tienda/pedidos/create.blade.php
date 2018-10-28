@extends('tienda.templates.cuerpo_cotizador')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
    {!!Form::open(['route'=>'pedidostienda.store', 'method'=>'POST', 'files' => true])!!}
    <div class="row" style="margin-top: 4%;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 6px">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Presupuesto
                        </span>
                    </div>
                    <div class="panel-body">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4" style="">
                                    <div class="input_presupuesto col-md-3">
                                        {!!Form::label('Fecha de elaboración')!!}
                                    </div>
                                    <div class="input-campo col-md-9">
                                        {!!Form::text('fecha',$fecha,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col-md-4" style="">
                                    <div class="input_presupuesto col-md-3">
                                        {!!Form::label('Lista de precios')!!}
                                    </div>
                                    <div class="input-campo col-md-9">
                                        {!!Form::text('listado_id',$lista,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col-md-4" style="">
                                    <div class="input_presupuesto col-md-3">
                                        {!!Form::label('Número del presupuesto')!!}
                                    </div>
                                    <div class="input-campo col-md-9">
                                        {!!Form::text('numero_presupuesto',$num_pre,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input_presupuesto col-md-2">
                                        {!!Form::label('N° de proyecto')!!}
                                    </div>
                                    <div class="input-campo col-md-10">
                                        {!!Form::text('numero_proyecto',null,['class'=>'form_login'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Cliente
                        </span>
                    </div>
                    <div class="panel-body">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="col-md-2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('apellido_cliente',null,['class'=>'form_login', 'placeholder' => 'Apellido'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('nombre_cliente',null,['class'=>'form_login', 'placeholder' => 'Nombres'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Localidad')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('localidad',null,['class'=>'form_login', 'placeholder' => 'Localidad de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Dirección')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('direccion',null,['class'=>'form_login', 'placeholder' => 'Dirección de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Telefonos')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono1',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono2',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 2'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono3',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 3'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Encargado')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('encargado',null,['class'=>'form_login', 'placeholder' => 'Nombre y Apellido del encargado de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Encargado')!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('telefono_encargado',null,['class'=>'form_login', 'placeholder' => 'Teléfono del encargado de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Dias de entrega')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Horarios de entrega')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="col-md-2 input-cliente">
                                    </div>
                                    <div class="input-cliente col-md-8">
                                        @foreach($horarios as $horario)
                                        <div class="input-cliente col-md-6">
                                            <p>
                                                <label>
                                                    <input class="filled-in" name="horario_id[]" type="checkbox" value="{!!$horario->id!!}"/>
                                                    <span>
                                                        {!!$horario->horario!!}
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2 input-cliente">
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="col-md-2 input-cliente">
                                    </div>
                                    <div class="input-cliente col-md-8">
                                        @foreach($dias as $dia)
                                        <div class="input-cliente col-md-6" style="    height: 30px;">
                                            <p>
                                                <label>
                                                    <input class="filled-in" name="dia_id[]" type="checkbox" value="{!!$dia->id!!}"/>
                                                    <span>
                                                        {!!$dia->dia!!}
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2 input-cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 1%;">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2" style="padding: 0;">
                                        {!!Form::label('Restricciones')!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    @foreach($restricciones as $restriccion)
                                    <div class="input-restriccion col-md-2">
                                    </div>
                                    <div class="input-restriccion col-md-10">
                                        <p>
                                            <label>
                                                <input class="filled-in" name="restriccion_id[]" type="checkbox" value="{{$restriccion->id}}"/>
                                                <span style="width: 430px;">
                                                    {!!Form::text('especificacion[]','',['class'=>'form_login', 'placeholder' => $restriccion->nombre])!!}
                                                </span>
                                            </label>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6" style="">
                                    @foreach($requeridas as $requerida)
                                    <div class="input-requerida col-md-2">
                                    </div>
                                    <div class="input-requerida col-md-10">
                                        <p>
                                            <label>
                                                <input class="filled-in" name="requerida_id[]" type="checkbox" value="{{$requerida->id}}"/>
                                                <span style="width: 430px;">
                                                    {!!$requerida->nombre!!}
                                                </span>
                                            </label>
                                        </p>
                                        <p>
                                            <span style="width: 430px;">
                                                {!!Form::text('drequerida[]','',['class'=>'form_login', 'placeholder' => $requerida->descripcion])!!}
                                            </span>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col l1 m1 s1 input-cliente">
                                    <label class="" for="aclaracion">
                                        Aclaraciones
                                    </label>
                                </div>
                                <div class="input-cliente col-md-11">
                                    <textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 160px!important;">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Item
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <span class="card-title">
                        </span>
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        Seleccione producto o servicio
                                    </h3>
                                    <div class="pull-right">
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group input-group">
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                            <label>
                                                Pieza
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                                                </div>
                                                <input class="input-group-select-val" name="contacts['type'][]" type="hidden" value="phone">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 1%;width: 12%;">
                                            <label>
                                                Material
                                            </label>
                                            <div class="input-group-btn input-group-selec">
                                                <div class="form-group">
                                                    {!! Form::select('material_id[]', $materiales, null, ['class' => 'form-control select-product', 'placeholder' => '', 'required']) !!}
                                                </div>
                                                <input class="input-group-select-val" name="contacts['type'][]" type="hidden" value="phone">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 0%;padding-right: 1%;width: 11%;">
                                            <label>
                                                Observaciones
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::text('observaciones_id[]', null, ['class' => 'form-control producto-price', 'placeholder' => '', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 0%;padding-right: 0%;width: 6%;">
                                            <label>
                                                Existencia
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::text('stock_id[]', null, ['class' => 'form-control producto-price', 'placeholder' => '', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Largo
                                            </label>
                                            {!! Form::text('largo[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!-- <input type="text" id="txt_campo_2" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Ancho
                                            </label>
                                            {!! Form::text('ancho[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!--<input type="text" id="txt_campo_1" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                M2
                                            </label>
                                            {!! Form::text('ancho[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!--  <input type="text" id="txt_campo_1" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label style="">
                                                Precio Mat
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Adicional
                                            </label>
                                            {!! Form::text('ancho[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!--<input type="text" id="txt_campo_1" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label style="">
                                                Precio adic
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Monto
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                -
                                            </label>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                    Agregar
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Terminaciones de borde
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <span class="card-title">
                        </span>
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    </h3>
                                    <div class="pull-right">
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label>
                                                Terminacion de borde
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                                                </div>
                                                <input class="input-group-select-val" name="contacts['type'][]" type="hidden" value="phone">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Largo
                                            </label>
                                            {!! Form::text('largo[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!-- <input type="text" id="txt_campo_2" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label style="">
                                                Precio Mat
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Monto
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                -
                                            </label>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                    Agregar
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Trabajos Aplicados
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <span class="card-title">
                        </span>
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    </h3>
                                    <div class="pull-right">
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-7" style="">
                                            <label>
                                                Trabajos
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                                                </div>
                                                <input class="input-group-select-val" name="contacts['type'][]" type="hidden" value="phone">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label style="">
                                                Unidad
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Cantidad
                                            </label>
                                            {!! Form::text('largo[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'ancho']) !!}
                                            <!-- <input type="text" id="txt_campo_2" onchange="sumar(this.value);" />-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label style="">
                                                Precio unit
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Monto $
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                -
                                            </label>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                    Agregar
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Trabajos Especiales
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <span class="card-title">
                        </span>
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    </h3>
                                    <div class="pull-right">
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-10" style="">
                                            <label>
                                                Trabajos
                                            </label>
                                            <div class="input-group-btn input-group-select">
                                                <div class="form-group">
                                                    {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                                                </div>
                                                <input class="input-group-select-val" name="contacts['type'][]" type="hidden" value="phone">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Monto $
                                            </label>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                        <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                -
                                            </label>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                    Agregar
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-md-offset-6" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading panel_total_item" style="">
                        <span class="presupuesto" style="color: white;">
                            Presupuesto Item
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;background-color: #CDCDCD;">
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Superficie
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 22.133
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Bordes
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 15.440
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Adicionales
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 19.436
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="padding-right: 0;padding-left: 0;">
                                            <label class="total_item">
                                                <b>
                                                    SUBTOTAL MATERIAL
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                <b>
                                                    $ 110.550
                                                </b>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Trabajos de Obras Globales
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <span class="card-title">
                        </span>
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    </h3>
                                    <div class="pull-right">
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                            <div class="col-md-10">
                                                <p>
                                                    <label>
                                                        Trabajos globales
                                                    </label><br><br>
                                                    <label>
                                                        <input class="filled-in" name="globales_id[]" type="checkbox" value=""/>
                                                        <span class="total_item" style="">
                                                            Medicion a domicilio sin instalación
                                                        </span>
                                                    </label>
                                                </p>
                                            </div>
                                        <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            <label>
                                                Monto $
                                            </label><br><br>
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                            <div class="col-md-10">
                                                <p>
                                                    <label>
                                                        <input class="filled-in" name="globales_id[]" type="checkbox" value=""/>
                                                        <span class="total_item" style="">
                                                            Flete a domicilio
                                                        </span>
                                                    </label>
                                                </p>
                                            </div>
                                        <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts">
                                    <div class="form-group multiple-form-group">
                                            <div class="col-md-10">
                                                <p>
                                                    <label>
                                                        <input class="filled-in" name="globales_id[]" type="checkbox" value=""/>
                                                        <span class="total_item" style="">
                                                            Medicion a domicilio sin instalación
                                                        </span>
                                                    </label>
                                                </p>
                                            </div>
                                        <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                            {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                            <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-6" style="padding:0;">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
                    <div class="panel-heading panel_total_item" style="background-color: #5CB85C!important;">
                        <span class="presupuesto" style="color: white;">
                            Presupuesto Item
                        </span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;background-color: #CDCDCD;">
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Superficie
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 22.133
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Bordes
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 15.440
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="">
                                            <label class="total_item">
                                                Adicionales
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                $ 19.436
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="">
                                    <div class="form-group multiple-form-group">
                                        <div class="col-md-8" style="padding-right: 0;padding-left: 0;">
                                            <label class="total_item">
                                                <b>
                                                    SUBTOTAL MATERIAL
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <span class="total_item">
                                                <b>
                                                    $ 110.550
                                                </b>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
                    <div class="panel-heading" style="">
                        <span class="presupuesto">
                            Observaciones
                        </span>
                    </div>
                    <div class="panel-body">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="col-md-2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('apellido_cliente',null,['class'=>'form_login', 'placeholder' => 'Apellido'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('nombre_cliente',null,['class'=>'form_login', 'placeholder' => 'Nombres'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Localidad')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('localidad',null,['class'=>'form_login', 'placeholder' => 'Localidad de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Dirección')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('direccion',null,['class'=>'form_login', 'placeholder' => 'Dirección de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Telefonos')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono1',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            <div class="col-md-12">
                                <div class="col l1 m1 s1 input-cliente">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono2',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 2'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::number('telefono3',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 3'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Encargado')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('encargado',null,['class'=>'form_login', 'placeholder' => 'Nombre y Apellido del encargado de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6" style="">
                                    <div class="input-cliente col-md-2">
                                        {!!Form::label('Encargado')!!}
                                    </div>
                                    <div class="input-cliente col-md-10">
                                        {!!Form::text('telefono_encargado',null,['class'=>'form_login', 'placeholder' => 'Teléfono del encargado de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6" style="">
                                    @foreach($restricciones as $restriccion)
                                    <div class="input-restriccion col-md-2">
                                    </div>
                                    <div class="input-restriccion col-md-10">
                                        <p>
                                            <label>
                                                <input class="filled-in" name="restriccion_id[]" type="checkbox" value="{{$restriccion->id}}"/>
                                                <span style="width: 430px;">
                                                    {!!Form::text('especificacion[]','',['class'=>'form_login', 'placeholder' => $restriccion->nombre])!!}
                                                </span>
                                            </label>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6" style="">
                                    @foreach($requeridas as $requerida)
                                    <div class="input-requerida col-md-2">
                                    </div>
                                    <div class="input-requerida col-md-10">
                                        <p>
                                            <label>
                                                <input class="filled-in" name="requerida_id[]" type="checkbox" value="{{$requerida->id}}"/>
                                                <span style="width: 430px;">
                                                    {!!$requerida->nombre!!}
                                                </span>
                                            </label>
                                        </p>
                                        <p>
                                            <span style="width: 430px;">
                                                {!!Form::text('drequerida[]','',['class'=>'form_login', 'placeholder' => $requerida->descripcion])!!}
                                            </span>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                                    <label class="" for="aclaracion">
                                        Aclaraciones
                                    </label>
                                </div>
                                <div class="input-cliente col-md-11">
                                    <textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 160px!important;">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </div>

            </div>
            <div>
                <a class="left" href="" style="cursor: pointer;">
                    <button class="boton_guardar">
                        <span>
                            Guardar Presupuesto
                        </span>
                    </button>
                </a>
                <a class="right" href="" style="cursor: pointer;">
                    <button class="boton_confirmar" type="submit">
                        <span>
                            Confirmar Pedido
                        </span>
                    </button>
                </a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    <!--
    <span>Valor #1</span>
<input type="text" id="txt_campo_1" onchange="sumar(this.value);" />
<br/ >
<span>Valor #2</span>
<input type="text" id="txt_campo_2" onchange="sumar(this.value);" />
<br/ >
<span>Valor #3</span>
<input type="text" id="txt_campo_3" onchange="sumar(this.value);" />
<br/ >
<span>El resultado es: </span> <span id="spTotal"></span>
</div>
-->
    @endsection 
@section('js')
    <script type="text/javascript">
        /* Sumar dos números. */
function sumar (valor) {
    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('spTotal').innerHTML;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
}

/* Sumar dos números. */
function monto (valor) {
    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('monto-total').innerHTML;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('monto-total').innerHTML = total;
}
    //SERVICES (Lista dinamica)  formgroup2
        (function ($) {
            $(function () {
                var addFormGroup2 = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group2');
                    var $formGroupClone = $formGroup.clone();
                    $(this)
                            .toggleClass('btn-success btn-add2 btn-danger btn-remove2')
                            .html('Borrar&nbsp&nbsp');
                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.superficie_id').text('Seleccione');
                    $formGroupClone.insertAfter($formGroup);
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add2').attr('disabled', true);
                    }
                    //Llamar calculate cuando se agrega servicio
                    calculate();

                };
                var removeFormGroup2 = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group2');
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add2').attr('disabled', false);
                    }
                    $formGroup.remove();

                    //Llamar calculate cuando se elimina servicio
                    calculate();
                };
                var selectFormGroup2 = function (event) {
                    event.preventDefault();
                    var $selectGroup = $(this).closest('.input-group-select');
                    var param = $(this).attr("href").replace("#", "");
                    var concept = $(this).text();
                    $selectGroup.find('.concept').text(concept);
                    $selectGroup.find('.input-group-select-val').val(param);
                }
                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };
                $(document).on('click', '.btn-add2', addFormGroup2);
                $(document).on('click', '.btn-remove2', removeFormGroup2);
                $(document).on('click', '.dropdown-menu a', selectFormGroup2);
            });
        })(jQuery);

        //Fin SERVICES

        //Si cambian el precio hora de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.order_hh', function () {
            calculate()
        });
        //Si cambian el discount de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.discount', function () {
            calculate()
        });
        //Si cambian el alguna hora de algun servicio de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.hh-service', function () {
            calculate()
        });
        //Si cambian el precio de algun producto de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.producto-price', function () {
            calculate()
        });
        //Si cambian la cantidad de algun producto de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.producto-quantity', function () {
            calculate()
        });

        //PRODUCTS (lista dinamica)
        //select for products
        (function ($) {
            $(function () {
                var addFormGroup = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $formGroupClone = $formGroup.clone();
                    $(this)
                            .toggleClass('btn-success btn-add btn-danger btn-remove')
                            .html('Borrar&nbsp&nbsp');
                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.superficie_id').text('Seleccione');
                    $formGroupClone.insertAfter($formGroup);
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                    }

                    //Llamar calculate y costos cuando se agrega producto

                    calculate();
                    calcular_total_costos();

                    var idproduct = $(this).closest('.multiple-form-group').find('.select-product').val();
                    var quantity = $(this).closest('.multiple-form-group').find('.producto-quantity').val();
                    remove_product_ajax(idproduct, quantity);

                    //fin

                };
                var removeFormGroup = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                    }
                    $formGroup.remove();

                     //Llamar calculate y costos cuando se elimina producto
                    calculate();
                    calcular_total_costos();

                    var idproduct = $(this).closest('.multiple-form-group').find('.select-product').val();
                    var quantity = $(this).closest('.multiple-form-group').find('.producto-quantity').val();
                    add_product_ajax(idproduct, quantity);

                    //Fin
                };
                var selectFormGroup = function (event) {
                    event.preventDefault();
                    var $selectGroup = $(this).closest('.input-group-select');
                    var param = $(this).attr("href").replace("#","");
                    var concept = $(this).text();
                    $selectGroup.find('.concept').text(concept);
                    $selectGroup.find('.input-group-select-val').val(param);
                }
                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };
                $(document).on('click', '.btn-add', addFormGroup);
                $(document).on('click', '.btn-remove', removeFormGroup);
                $(document).on('click', '.dropdown-menu a', selectFormGroup);
            });
        })(jQuery);
        //Fin PRODUCTS



        //Colocar precio, costo y stock de los productos en los fields

        $(document).on('change', '.select-product', function () {
            var id = $(this).val();
            var myArray = {!! $prod !!};

            var found = $.map(myArray, function (val) {
                return val.id == id ? val.price : null;
            });

            var quantity = $.map(myArray, function (val) {
                return val.id == id ? val.quantity : null;
            });

            var cost = $.map(myArray, function (val) {
                return val.id == id ? val.cost : null;
            });

            var observacion = $.map(myArray, function (val) {
                return val.id == id ? val.observacion : null;
            });

          //  $(".alto").val(alto)

         //   $(this).closest('.multiple-form-group').find('.calculo-monto').val(alto[0]);
            $(this).closest('.multiple-form-group').find('.producto-price').val(cost[0]);
            $(this).closest('.multiple-form-group').find('.producto-observacion').val(observacion[0]);
            $(this).closest('.multiple-form-group').find('.producto-stock').val(quantity[0]);
            //$(this).closest('.multiple-form-group').find('.producto-cost').val(cost[0]);

            console.log(found[0]);

        });

        //Fin Colocar precio, costo y stock de los productos en los fields

        //Calcular total de los productos
        function calcular_total_producto() {

            productos_total = 0

            $(".producto-price").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            productos_total = productos_total + (eval($(this).val()) * eval($(this).closest('.multiple-form-group').find('.producto-quantity').val()));
                        }
                    }
            );

            if (isNaN(productos_total)) {
                productos_total = 0
            }

            return productos_total;
        }

        //Fin  Calcular total de los productos


        //Caluclar total de los servicios
        function calcular_total_servicios() {

            servicios_total = 0

            var hh = eval($(".order_hh").val());
            ;

            var size = $(".hh-service").size();
            console.log('size service =' + size);
            $(".hh-service").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            servicios_total = servicios_total + (eval($(this).val()) * hh);
                        }
                        //eval($(this).closest('.multiple-form-group2').find('.hh-service').val()
                    });

            if (isNaN(servicios_total)) {
                servicios_total = 0
            }

            return servicios_total;
        }
        //Fin  Caluclar total de los servicios

        //Caluclar total de los costos
        function calcular_total_costos() {
            costos = 0

            $(".producto-cost").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            costos = costos + (eval($(this).val()) * eval($(this).closest('.multiple-form-group').find('.producto-quantity').val()));
                        }
                    });

            if (isNaN(costos)) {
                costos = 0
            }

            //retornar valor, directo al field
            $(".costo_total").val(costos)
        }
        //Fin  Caluclar total de los costos

        //Inicio calculate, realiza la mayoria de los calculos de la pagina, llamando a las otras funciones
        function calculate() {

            calcular_total_costos();

          //  var conf_iva = ;

            if ($(".discount").val() > 0) {
                var porc = eval($(".discount").val() / 100);
                var discount = eval((calcular_total_producto() + calcular_total_servicios()) * porc);
                var sum = eval((calcular_total_producto() + calcular_total_servicios()) - discount);
            } else {
                var sum = eval(calcular_total_producto() + calcular_total_servicios());
            }

        //    var iva = eval(sum * (conf_iva / 100))
            var neto = eval(sum - iva)

            $(".neto").val(neto)
           // $(".iva").val(iva)

            $(".total").val(sum)

        }
        //Fin calculate
    </script>
    @endsection
</div>