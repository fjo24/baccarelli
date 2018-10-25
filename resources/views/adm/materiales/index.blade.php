@extends('adm.layouts.frame')

@section('titulo', 'Materiales')

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
						<td>Codigo</td>
						<td>Nombre</td>
						<td>Modeda</td>
						<td>Precio M2</td>
						<td>Precio con descuento</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($materiales as $material)
						<tr>
							<td>{{ $material->codigo }}</td>
							<td>{{ $material->nombre }}</td>
							<td>{{ $material->moneda }}</td>
							<td>{{ $material->precio }}</td>
							<td>{{ $material->precio_descuento }}</td>
							<td class="text-right">
								<a href="{{ route('materiales.edit', $material->id) }}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['materiales.destroy', $material->id], 'method' => 'DELETE'])!!}
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
				<a href="{{route('excelcat')}}">
					<button class="boton btn-large right" name="action" type="submit">
                		Cargar excel
            		</button>			
				</a>	
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection