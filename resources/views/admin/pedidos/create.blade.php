@extends('admin.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
    {!!Form::open(['route'=>'pedidosadmin.store', 'method'=>'POST', 'files' => true])!!}
    <div class="row" style="margin-top: 4%;">
        <div class="row">
            <div class="col s12 m12">
                <div class="card #e0e0e0 grey lighten-2" style="border-radius: 6px">
                    <div class="card-action" style="">
                        <span class="presupuesto">
                            Presupuesto
                        </span>
                    </div>
                    <div class="card-content">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="col l4 m4 s4" style="">
                                    <div class="input_presupuesto col l3 m3 s3">
                                        {!!Form::label('Fecha de elaboración')!!}
                                    </div>
                                    <div class="input-campo col l9 m9 s9">
                                        {!!Form::text('fecha',$fecha,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col l4 m4 s4" style="">
                                    <div class="input_presupuesto col l3 m3 s3">
                                        {!!Form::label('Lista de precios')!!}
                                    </div>
                                    <div class="input-campo col l9 m9 s9">
                                        {!!Form::text('listado_id',$lista,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col l4 m4 s4" style="">
                                    <div class="input_presupuesto col l3 m3 s3">
                                        {!!Form::label('Número del presupuesto')!!}
                                    </div>
                                    <div class="input-campo col l9 m9 s9">
                                        {!!Form::text('numero_presupuesto',$num_pre,['class'=>'input_disabled', 'disabled'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input_presupuesto col l2 m2 s2">
                                        {!!Form::label('N° de proyecto')!!}
                                    </div>
                                    <div class="input-campo col l10 m10 s10">
                                        {!!Form::number('numero_proyecto',null,['class'=>'form_login'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="card #e0e0e0 grey lighten-2" style="border-radius: 6px">
                    <div class="card-action" style="">
                        <span class="presupuesto">
                            Cliente
                        </span>
                    </div>
                    <div class="card-content">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('apellido_cliente',null,['class'=>'form_login', 'placeholder' => 'Apellido'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Cliente')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('nombre_cliente',null,['class'=>'form_login', 'placeholder' => 'Nombres'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Localidad')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('localidad',null,['class'=>'form_login', 'placeholder' => 'Localidad de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Dirección')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('direccion',null,['class'=>'form_login', 'placeholder' => 'Dirección de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Telefonos')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::number('telefono1',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 1'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::number('telefono2',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 2'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::number('telefono3',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 3'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Encargado')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('encargado',null,['class'=>'form_login', 'placeholder' => 'Nombre y Apellido del encargado de la obra'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Encargado')!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('telefono_encargado',null,['class'=>'form_login', 'placeholder' => 'Teléfono del encargado de la obra'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Dias de entrega')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        {!!Form::label('Horarios de entrega')!!}
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="col l2 m2 s2 input-cliente">

                                    </div>
                                    <div class="input-cliente col l8 m8 s8">
                                        @foreach($horarios as $horario)
                                        <div class="input-cliente col l6 m6 s6">
                                            <p>
                                                <label>
                                                    <input type="checkbox" name="horario_id[]" class="filled-in" value="{!!$horario->id!!}"/>
                                                    <span>{!!$horario->horario!!}</span>
                                                </label>
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col l2 m2 s2 input-cliente">
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="col l2 m2 s2 input-cliente">
                                    </div>
                                    <div class="input-cliente col l8 m8 s8">
                                        @foreach($dias as $dia)
                                        <div class="input-cliente col l6 m6 s6" style="height: 30px;">
                                            <p>
                                                <label>
                                                    <input type="checkbox" name="dia_id[]" class="filled-in" value="{!!$dia->id!!}"/>
                                                    <span>{!!$dia->dia!!}</span>
                                                </label>
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col l2 m2 s2 input-cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12" style="margin-bottom: 1%;">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2" style="padding: 0;">
                                        {!!Form::label('Restricciones')!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        <span>
                                            Completar los campos que correspondan
                                        </span>
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    @foreach($restricciones as $restriccion)
                                    <div class="input-restriccion col l2 m2 s2">
                                    </div>
                                    <div class="input-restriccion col l10 m10 s10">
                                        <p>
                                          <label>
                                            <input type="checkbox" name="restriccion_id[]" class="filled-in" value=""/>
                                            <span style="width: 430px;">{!!Form::text('restriccion',null,['class'=>'form_login', 'placeholder' => $restriccion->nombre])!!}</span>
                                          </label>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    @foreach($requeridas as $requerida)
                                    <div class="input-requerida col l2 m2 s2">
                                    </div>
                                    <div class="input-requerida col l10 m10 s10">
                                        <p>
                                          <label>
                                            <input type="checkbox" name="requerida_id[]" class="filled-in" value=""/>
                                            <span style="width: 430px;">{!!$requerida->nombre!!}</span>
                                          </label>
                                        </p>
                                        <p>
                                            <span style="width: 430px;">{!!Form::text('telefono_encargado',null,['class'=>'form_login', 'placeholder' => $requerida->descripcion])!!}</span>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="col l1 m1 s1 input-cliente">
                                    <label class="" for="aclaracion">
                                        Aclaraciones
                                    </label>
                                </div>
                                <div class="input-cliente col l11 s11">
                                    <textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 160px!important;">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <!--       <div class="row">
            <div class="col s12 m12">
                <div class="card #e0f2f1 teal lighten-5" style="border-radius: 6px">
                    <div class="card-action" style="">
                        <span class="presupuesto">
                            Item
                        </span>
                    </div>
                    <div class="card-content">
                        <span class="card-title">
                        </span>
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        <label for="Cliente" class="no_padding">Cliente</label>
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('apellido_cliente',null,['class'=>'form_login', 'placeholder' => 'Apellido'])!!}
                                    </div>
                                </div>
                                <div class="col l6 m6 s6" style="">
                                    <div class="input-cliente col l2 m2 s2">
                                        <label for="Cliente" class="no_padding">Cliente</label>
                                        {!!Form::label('*', '*', ['class' => 'rojo'])!!}
                                    </div>
                                    <div class="input-cliente col l10 m10 s10">
                                        {!!Form::text('nombre_cliente',null,['class'=>'form_login', 'placeholder' => 'Nombres'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
<!--
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a>
            <br /><br /><br />
                        
            <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr >
                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            Name
                        </th>
                        <th class="text-center">
                            Surname
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='addr0'>
                        <td>
                        1
                        </td>
                        <td>
                        <input type="text" name='name[]'  placeholder='Name' class="form-control"/>
                        </td>
                        <td>
                        <input type="text" name='sur[]' placeholder='Surname' class="form-control"/>
                        </td>
                        <td>
                        <input type="text" name='email[]' placeholder='Email' class="form-control"/>
                        </td>
                    </tr>
                    <tr id='addr1'></tr>
                </tbody>
            </table>
        </div>
    </div>
-->
    <!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->

    <!--
</div>

                
                        <div>
                            <a class="right" href="" style="cursor: pointer;">
                                <button class="boton_agregar">
                                       + Añadir
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>-->
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
</div>
@endsection 
@section('js')
<script type="text/javascript">

// Activate Next Step

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
});


// Add , Dlelete row dynamically

     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name[]' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur[]' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email[]' type='text' placeholder='Email'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });

});

</script>
@endsection
