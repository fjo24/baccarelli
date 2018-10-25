@extends('adm.layouts.frame')

@section('titulo', 'Lista usuarios de tiendas')

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
						<td>Usuario</td>
						<td>Nivel</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($distribuidores as $distribuidor)
						<tr>
							<td>{!!$distribuidor->name!!} {!!$distribuidor->apellido!!}</td>
							<td>{!!$distribuidor->username!!}</td>
							<td>
								@if($distribuidor->rango=='t_jefelinea')
									Jefe de Linea
								@elseif($distribuidor->rango=='t_jefetienda')
									Jefe de Tienda
								@elseif($distribuidor->rango=='t_admin')
									Admin de Tienda
								@elseif($distribuidor->rango=='t_vendedor')	
									Vendedor
								@endif
							</td>
							<td class="text-right">
								<a href="{{ route('distribuidores.edit',$distribuidor->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['distribuidores.destroy', $distribuidor->id], 'method' => 'DELETE'])!!}
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
        <a href="{{ route('distribuidores.create') }}">
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