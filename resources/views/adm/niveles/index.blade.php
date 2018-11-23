@extends('adm.layouts.frame')

@section('titulo', 'Niveles')

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
		<table class="highlight bordered">
			<thead>
				<td>Descripción</td>
				<td class="text-right">Acciones</td>
			</thead>
			<tbody>
				@foreach($niveles as $nivel)
				<tr>
					<td>{{ $nivel->descripcion }}</td>
					<td class="text-right">
						<a href="{{ route('niveles.edit', $nivel->id) }}"><i class="material-icons">create</i></a>
						{!!Form::open(['class'=>'en-linea', 'route'=>['niveles.destroy', $nivel->id], 'method' => 'DELETE'])!!}
						<button class="submit-button" onclick="return confirm_delete(this);" type="submit">
							<i class="material-icons red-text">
								cancel
							</i>
						</button>
						{!!Form::close()!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>
@endsection