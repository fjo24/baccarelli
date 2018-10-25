@extends('pages.templates.body')
@section('title', 'Acceso Tienda')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/general.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="row #ffebee red lighten-5" style="padding-bottom: 127px;margin-bottom: 0px;">
    <div class="col l12 s12">
        {!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST', 'class' => 'col s12'])!!}
        <div style="margin-top: 6.5%;" class="col l4 offset-l4 m4 offset-m4 s4 offset-s4">
            <div class="usuario_input input-field col l3 m3 s3">
	            {!!Form::label('Email')!!}
            </div>
        	<div class="input-field col l9 m9 s9">
                {!!Form::text('username',null,['class'=>'form_login', 'placeholder' => 'Ingrese su email'])!!}
            </div>
        </div>
        <div class="col l4 offset-l4 m4 offset-m4 s4 offset-s4">
            <div class="contrasena_input input-field col l3 m3 s3">
				{!!Form::label('Contraseña')!!}
            </div>
            <div class="input-field col l9 m9 s9">
                {!!Form::password('password',['class'=>'form_login', 'placeholder' => 'Ingrese su contrasena'])!!}
            </div>
        <button style="margin-right: 40%;" class="btn waves-effect waves-light pink right" name="action" type="submit">
            Ingresar
        </button>
        </div>
        <div class="col l4 m4 s4">
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
</script>
@endsection
