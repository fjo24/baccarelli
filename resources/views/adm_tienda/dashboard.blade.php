@extends('adm_tienda.layouts.frame')

@section('titulo', 'Bienvenido')

@section('contenido')
<a href="{{route("tienda.presupuestos")}}">
	<button class="boton btn-large left" name="action" type="submit">
                Volver a presupuestos
            </button>
</a>
@endsection
@section('js')
@endsection