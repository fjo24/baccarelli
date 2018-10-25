@extends('adm.layouts.frame')

@section('titulo', 'Crear Tienda')

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
			{!!Form::open(['route'=>'tiendas.store', 'method'=>'POST', 'files' => true])!!}
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Cuit:')!!}
						{!!Form::text('cuit', null , ['class'=>'', 'required'])!!}
					</div>
					<div class="input-field col l4 s12 m4">
						{!!Form::label('Email:')!!}
						{!!Form::text('email', null , ['class'=>'', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col l6 s12">
                <label>Utiliza orden de compra?</label>
                <br>
            <p>
      <label>
        <input class="with-gap" name="orden_compra" type="radio" value="1"  />
        <span>Si</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="orden_compra" type="radio" value="0" />
        <span>No</span>
      </label>
    </p>
            </div>
				<div class="row">
					<div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Logo
                    </span>
                    {!! Form::file('logo') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('logo',null, ['class'=>'file-path', 'placeholder' => 'Recomendado (112 x 112)']) !!}
                </div>
            </div>
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