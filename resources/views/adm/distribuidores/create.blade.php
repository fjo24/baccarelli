@extends('adm.layouts.frame')

@section('titulo', 'Crear usuario tienda')

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
	<div class="col s12">
		{!!Form::open(['route'=>'distribuidores.store', 'method'=>'POST', 'files' => true])!!}
		{{ csrf_field() }}
		<div class="row">
			<div class="input-field col l4 s12 m4">
				{!!Form::label('Nombre:')!!}
				{!!Form::text('name', null , ['class'=>'', 'required'])!!}
			</div>
			<div class="input-field col l4 s12 m4">
				{!!Form::label('Apellido:')!!}
				{!!Form::text('apellido', null , ['class'=>'', 'required'])!!}
			</div>
			<div class="input-field col l4 s12 m4">
				{!!Form::label('Username:')!!}
				{!!Form::text('username', null , ['class'=>'', 'required'])!!}
			</div>
		</div>
		<div class="row">
			<div class="input-field col l6 s12 m6">
				{!! Form::label('Cargo') !!}<br>
				{!! Form::select('rango', ['t_admin' => 'Admin de tienda', 't_jefelinea' => 'Jefe de Linea', 't_jefetienda' => 'Jefe de Tienda', 't_vendedor' => 'Vendedor'], null, ['class' => 'form-control', 'placeholder' => 'Indique tipo de usuario']) !!}
			</div>
			<div class="input-field col l6 s12 m6">
				{!! Form::label('Tiena a la que pertenece') !!}<br>
				{!! Form::select('tienda_id', $tiendas, null, ['class' => 'form-control', 'placeholder' => 'Tiendas', 'required']) !!}
			</div>
		</div>
		<div class="row">
			<div class="input-field col l4 s12 m4">
				{!!Form::label('Telefono:')!!}
				{!!Form::text('telefono', null , ['class'=>'', 'required'])!!}
			</div>
			<div class="input-field col l4 s12 m4">
				<i class="material-icons prefix">https</i>
				{!!Form::password('password',['class'=>''])!!}
				{!!Form::label('Contraseña')!!}
			</div>
			<div class="input-field col l4 s12 m4">
				{!!Form::label('Correo electronico:')!!}
				{!!Form::text('email', null , ['class'=>'', 'required'])!!}
			</div>
		</div>
		<button class="boton btn-large right" name="action" type="submit">
			Crear
		</button>
		{!!Form::close()!!}
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		$('select').formSelect();
	});
</script>
@endsection