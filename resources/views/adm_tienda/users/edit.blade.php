@extends('adm_tienda.layouts.frame')

@section('titulo', 'Editar Usuario')

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
			{!!Form::model($distribuidor, ['route'=>['distribuidorestienda.update',$distribuidor->id], 'method'=>'PUT', 'files' => true])!!}
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('name', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Apellido:')!!}
						{!!Form::text('apellido', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Username:')!!}
						{!!Form::text('username', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Telefono:')!!}
						{!!Form::text('telefono', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Correo electronico:')!!}
						{!!Form::text('email', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
                        <i class="material-icons prefix">https</i>
                        {!!Form::password('password',['class'=>''])!!}
                        {!!Form::label('Contraseña')!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col l6 s12 m6">
						{!! Form::label('Tipo de usuario') !!}<br />
						{!! Form::select('rango', ['b_supervisor' => 'Supervisor', 'b_medidor' => 'Medidor', 'b_logistica' => 'Logistica', 'b_fabrica' => 'Fabrica', 'b_administrativo' => 'Administrativo'], null, ['class' => 'form-control', 'placeholder' => 'Indique tipo de usuario']) !!}
                    </div>
                    <div class="file-field input-field col l6 s12">
	                	{!! Form::label('Sucursales') !!}<br />
	                	{!! Form::select('sucursal_id', $sucursales, null, ['class' => 'form-control', 'placeholder' => 'Sucursales']) !!}
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
	
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection