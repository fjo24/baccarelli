@extends('adm_tienda.layouts.frame')

@section('titulo', 'Editar Tienda')

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
			{!!Form::model($tienda, ['route'=>['admintiendas.update',$tienda->id], 'method'=>'PUT', 'files' => true])!!}
				{{ csrf_field() }}
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