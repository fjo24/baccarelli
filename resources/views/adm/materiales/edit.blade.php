@extends('adm.layouts.frame')

@section('titulo', 'Editar Material')

@section('contenido')
        @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col l12 s12">
        {!!Form::model($material, ['route'=>['materiales.update',$material->id], 'method'=>'PUT', 'files' => true])!!}   
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('Moneda') !!}<br />
                {!! Form::select('moneda', ['peso' => 'peso', 'dolar' => 'dolar'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de moneda']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Precio:')!!}
                {!!Form::text('precio', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Precio:')!!}
                {!!Form::text('precio_descuento', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                {!! Form::label('Observaciones') !!}<br />
                {!! Form::select('observacion_id', $observaciones, null, ['class' => 'form-control', 'placeholder' => 'Observaciones']) !!}
            </div>
            <div class="col l12 s12 no-padding">
                <button class="boton btn-large right" name="action" type="submit">
                    Editar
                </button>
            </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.replace('video_descripcion');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
