@extends('adm.layouts.frame')

@section('titulo', 'Editar Valor Flete')

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
		{!!Form::model($flete, ['route'=>['fletes.update',$flete->id], 'method'=>'PUT', 'files' => true])!!}
		{{ csrf_field() }}
		<div class="row">
			<div class="input-field col l4 s12">
				{!!Form::label('Valor del flete:')!!}
				{!!Form::text('flete', null , ['class'=>'', ''])!!}
			</div>
			<div class="input-field col l4 s12">
				{!!Form::label('Valor de Colocación:')!!}
				{!!Form::text('colocacion', null , ['class'=>'', ''])!!}
			</div>
			<div class="input-field col l4 s12">
				{!!Form::label('Valor de Medicion:')!!}
				{!!Form::text('medicion', null , ['class'=>'', ''])!!}
			</div>
		</div>
		<button class="boton btn-large right" name="action" type="submit">
			Editar
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
