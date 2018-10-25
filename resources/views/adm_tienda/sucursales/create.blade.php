@extends('adm_tienda.layouts.frame')

@section('titulo', 'Crear Sucursal')

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
			{!!Form::open(['route'=>'sucursales.store', 'method'=>'POST', 'files' => true])!!}
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Telefono:')!!}
						{!!Form::text('telefono', null , ['class'=>'', 'required'])!!}
					</div>
				</div>
				<button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
				{!!Form::close()!!} 
			</div>
		</div>
@endsection
@section('js')
<script type="text/javascript">
	
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection