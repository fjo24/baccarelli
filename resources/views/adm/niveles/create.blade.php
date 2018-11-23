@extends('adm.layouts.frame')

@section('titulo', 'Niveles')

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
	{!!Form::open(['route'=>'niveles.store', 'method'=>'POST', 'files' => true])!!}
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 1 (<4):')!!} {!!Form::text('nivel1a', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 1 (4 a 6):')!!} {!!Form::text('nivel1b', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 1 (>6):')!!} {!!Form::text('nivel1c', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 2 (<4):')!!} {!!Form::text('nivel2a', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 2 (4 a 6):')!!} {!!Form::text('nivel2b', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 2 (>6):')!!} {!!Form::text('nivel2c', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 3 (<4):')!!} {!!Form::text('nivel3a', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 3 (4 a 6):')!!} {!!Form::text('nivel3b', null , ['class'=>'', ''])!!}
		</div>
		<div class="input-field col l4 s12">
			{!!Form::label('Nivel 3 (>6):')!!} {!!Form::text('nivel3c', null , ['class'=>'', ''])!!}
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