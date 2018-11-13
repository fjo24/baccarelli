@extends('adm.layouts.frame')

@section('titulo', 'Localidades')

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
		<table class="highlight bordered">
			<thead>
				<td>
					Nombre
				</td>
				<td>
					Horas de flete
				</td>
				<td>
					Horas de peaje
				</td>
				<td>
					Total en pesos
				</td>
				<td class="text-right">
					Acciones
				</td>
			</thead>
			<tbody>
				@foreach($localidades as $localidad)
				<tr>
					<td>
						{{ $localidad->nombre }}
					</td>
					<td>
						{{ $localidad->horas_flete }}
					</td>
					<td>
						{{ $localidad->horas_peaje }}
					</td>
					<td>
						{{ $localidad->horas_flete + $localidad->horas_peaje }}
					</td>
					<td class="text-right">
						<a href="{{ route('localidades.edit', $localidad->id) }}">
							<i class="material-icons">
								create
							</i>
						</a>
						{!!Form::open(['class'=>'en-linea', 'route'=>['localidades.destroy', $localidad->id], 'method' => 'DELETE'])!!}
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
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection