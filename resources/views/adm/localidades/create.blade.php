@extends('adm.layouts.frame')

@section('titulo', 'Crear Localidad')

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
	{!!Form::open(['route'=>'localidades.store', 'method'=>'POST', 'files' => true])!!}
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col l4 m4 s12">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 m4 s12">
			{!!Form::label('Horas flete:')!!}
			{!!Form::text('horas_flete', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 m4 s12">
			{!!Form::label('Horas peaje:')!!}
			{!!Form::text('horas_peaje', null , ['class'=>'', ''])!!}
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
