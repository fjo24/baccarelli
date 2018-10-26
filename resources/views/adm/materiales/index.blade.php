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
				<span class="" name="action" >
                	El valor del dolar configurado es <b>{!! $dolar->valor !!}</b> pesos por dolar
            	</span>				
			</div>
			<div class="col s12">
				<a href="{{route('dolares.edit', $dolar->id)}}">
					<button class="boton btn-small left">
                		Cambiar valor dolar
            		</button>			
				</a>	
				<a href="{{route('excelcat')}}">
					<button class="boton btn-small right" name="action" type="submit">
                		Cargar excel
            		</button>
				</a>
			</div>
			<br><br><br>
			<div class="col s12">
				<table class="highlight bordered">
					<thead>
						<td>Codigo</td>
						<td>Nombre</td>
						<td>Precio en pesos</td>
						<td>Precio con descuento</td>
						<td>Precio en USD</td>
						<td>Precio con descuento USD</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($materiales as $material)
						<tr>
							<td>{{ $material->codigo }}</td>
							<td>{{ $material->nombre }}</td>
							<td>${{ $material->precio }}
							</td>
							<td>${{ $material->cost }}
							</td>
							<td>
								@if($material->precio_dolar==null)
									N/A
								@else
								$USD {{ $material->precio_dolar }}
								@endif
							</td>
							<td>
								@if($material->cost_dolar==null)
									N/A
								@else
								$USD {{ $material->cost_dolar }}
								@endif
							</td>
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
			</div>
		</div>
		<div class="row">
				<div class="col s12">
				<a href="{{route('dolares.edit', $dolar->id)}}">
					<button class="boton btn-small left">
                		Cambiar valor dolar
            		</button>			
				</a>	
				<a href="{{route('excelcat')}}">
					<button class="boton btn-small right" name="action" type="submit">
                		Cargar excel
            		</button>
				</a>
			</div>
			<div class="col s12">
				<span class="" name="action" >
                	El valor del dolar configurado es <b>{!! $dolar->valor !!}</b> pesos por dolar
            	</span>				
			</div>
		</div>
			<br><br><br><br>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection