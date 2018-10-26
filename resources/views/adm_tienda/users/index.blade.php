@extends('adm_tienda.layouts.frame')

@section('titulo', 'Lista usuarios')

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
					@foreach($distribuidores as $user)
						<tr>
							<td>{!!$user->name!!} {!!$user->apellido!!}</td>
							<td>{!!$user->username!!}</td>
							<td>
								@if($user->rango=='t_jefelinea')
									Jefe de linea
								@elseif($user->rango=='t_jefetienda')
									Jefe de tienda
								@elseif($user->rango=='t_vendedor')	
									Vendedor
								@elseif($user->rango=='t_admin')	
									<span class="badge" style="background-color: #aa0000;color: white;font-weight: 600;">	
									Admin
									</span>
								@endif
							</td>
							@if($user->rango=='t_admin')	
							<td class="text-right">
								<a href="{{ route('distribuidorestienda.edit',$user->id)}}"><i class="material-icons">create</i></a>
							</td>
							@else
							<td class="text-right">
								<a href="{{ route('distribuidorestienda.edit',$user->id)}}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['distribuidorestienda.destroy', $user->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
									</button>
								{!!Form::close()!!}
							</td>
								@endif
						</tr>
					@endforeach
					</tbody>
				</table>
				<br>
        <a href="{{ route('distribuidorestienda.create') }}">
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