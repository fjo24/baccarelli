@extends('adm.layouts.frame')

@section('titulo', 'Crear Estado')

@section('contenido')
@if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
            <li>{!!$error!!}</li>
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
    {!!Form::open(['route'=>'estados.store', 'method'=>'POST', 'files' => true])!!}
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col l6 m6 s12">
            {!!Form::label('Descripcion:')!!}
            {!!Form::text('descripcion', null , ['class'=>'', ''])!!}
        </div>
        <div class="input-field col l6 s12">
            <label>Accion siguiente corresponde a:</label>
            <br>
            <p>
                <label>
                    <input class="with-gap" name="selector" type="radio" value="1" />
                    <span>Baccarelli</span>
                </label>
            </p>
            <p>
                <label>
                    <input class="with-gap" name="selector" type="radio" value="0" />
                    <span>Tienda</span>
                </label>
            </p>
        </div>
    </div>
    <button class="boton btn-large right" name="action" type="submit">
        Crear
    </button>
    {!!Form::close()!!}
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
@endsection