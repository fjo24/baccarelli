@extends('adm.layouts.frame')

@section('titulo', 'Lista tienda')

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
						<td>Nombre</td>
						<td>Cuit</td>
						<td>Correo electronico</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($tiendas as $tienda)
						<tr>
							<td>{!!$tienda->nombre!!}</td>
							<td>{!!$tienda->cuit!!}</td>
							<td>{!!$tienda->email!!}</td>
							<td class="text-right">
								<a href="{{ route('tiendas.edit',$tienda->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['tiendas.destroy', $tienda->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
									</button>
								{!!Form::close()!!}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<br>
        <a href="{{ route('tiendas.create') }}">
            <div class="col l12 s12 no-padding" href="">
                <button class="boton btn-large right" name="action" type="submit">
                    Nuevo
                </button>
            </div>
        </a>		
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection