@extends('adm.layouts.frame')

@section('titulo', 'Listado de presupuestos')

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
						<td>Cliente</td>
						<td>Vendedor</td>
						<td>Fecha</td>
						<td>N° del Presupuesto</td>
						<td></td>
						<td></td>
						<td></td>
					</thead>
					<tbody>
					@foreach($pedidos as $pedido)
						<tr>
							<td>{!!$pedido->apellido_cliente!!}, {!!$pedido->nombre_cliente!!}</td>
							<td>{{Auth()->user()->username }}</td>
							<td>{!!$pedido->nivel!!}</td>
							<td class="text-right">
								<a href="{{ route('tiendas.edit',$user->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['tiendas.destroy', $user->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
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