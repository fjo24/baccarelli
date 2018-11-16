@extends('adm_tienda.layouts.frame')

@section('titulo', 'Editar Quienes Somos')

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
    <div class="col s12">
        {!!Form::model($contenido, ['route'=>['contenido_observaciones_t.update',$contenido->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo condiciones:')!!}
                {!!Form::text('titulo_condiciones', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Contenido condiciones:')!!}
                {!!Form::textarea('contenido_condiciones', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo plazos:')!!}
                {!!Form::text('titulo_plazos', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Contenido plazos:')!!}
                {!!Form::textarea('contenido_plazos', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo aclaraciones:')!!}
                {!!Form::text('titulo_aclaraciones', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Contenido aclaraciones:')!!}
                {!!Form::textarea('contenido_aclaraciones', null , ['class'=>'', ''])!!}
            </div>
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
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
@endsection