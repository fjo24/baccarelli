@extends('adm.layouts.frame')

@section('titulo', 'Editar Contenido Trabajos Globales')

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
        {!!Form::model($contenido, ['route'=>['contenido_globales.update',$contenido->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo:')!!}
                {!!Form::text('titulo', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l12 s12">
                {!!Form::label('Contenido:')!!}
                {!!Form::textarea('contenido', null , ['class'=>'', ''])!!}
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