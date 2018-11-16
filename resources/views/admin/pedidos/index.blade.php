@extends('admin.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet" />
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="">
@endsection
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
<div class="container" style="width: 94%;">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card #e0e0e0 grey lighten-2" style="margin-bottom: 7%;border-radius: 6px;margin-top: 7%;">
				<div class="card-action" style="">
					<span class="presupuesto">
						Presupuestos
					</span>
					<a class="nuevo_p right" href="{{route('pedidosadmin.create')}}">
						Nuevo +
					</a>
				</div>
				<div class="card-content panel_tabla" style="">
					<table class="highlight bordered" style="">
						<thead>
							<td class="td_baccarelli">Cliente</td>
							<td class="td_baccarelli">Vendedor</td>
							<td class="td_baccarelli">Fecha</td>
							<td class="td_baccarelli">N° del Presupuesto</td>
							<td class=""><img src="{{asset('img/signo_amarillo.png')}}" /></td>
							<td class=""><img src="{{asset('img/signo_rojo.png')}}" /></td>
							<td class=""><img src="{{asset('img/signo_verde.png')}}" /></td>
							<td class="td_baccarelli">Estado</td>
						</thead>
						<tbody>
							@foreach($pedidos as $pedido)
							<tr>
								<td class="td_baccarelli" style="font-weight: 400;">{!!$pedido->apellido_cliente!!}, {!!$pedido->nombre_cliente!!}</td>
								<td class="td_baccarelli" style="font-weight: 400;">{{Auth()->user()->name }}</td>
								<td class="td_baccarelli" style="font-weight: 400;">{!!$pedido->created_at!!}</td>
								<td class="td_baccarelli" class="text-right" style="font-weight: 400;">{!!$pedido->numero_presupuesto!!}</td>
								<td class="" class="text-right" style="font-weight: 400;">
									<a href="">
										<button class="boton_datos fondo_amarillo">
											Agregar Datos
										</button>
									</a>
								</td>
								<td class="" class="text-right" style="font-weight: 400;">
									<a href="{{route('noaprobado', $pedido->id)}}">
										<button class="boton_datos fondo_rojo" onClick="javascript: return confirm('¿Realmente quiere dar de baja al pedido?');">
											Dar de baja y Archivar
										</button>
									</a>
								</td>
								<td class="" class="text-right" style="font-weight: 400;">
									<button class="boton_datos fondo_verde">
										Generar nueva versión
									</button>
								</td>
								<td class="td_baccarelli" class="text-right">
									@if ($pedido->estado->selector == '1')
									<!-- CONJUNTO DE ESTADOS POSIBLES PARA BACCARELLI-->
									<a class="" href="{{route('accion_estados', $pedido->id)}}">
										<button class="boton_datos fondo_activo" style="cursor:pointer!important;">
											{!!$pedido->estado->descripcion!!}
										</button>
									</a>
									@else
									<a class="modal-trigger" href="#modalp{!!$pedido->id!!}">
										<button class="boton_datos fondo_espera" style="cursor:pointer!important;">
											{!!$pedido->estado->descripcion!!}
										</button>
									</a>
									<!-- FIN CONJUNTO DE ESTADOS POSIBLES PARA BACCARELLI-->
									@endif
								</td>
							</tr>
							<!-- Modal Structure -->
							<div id="modalp{!!$pedido->id!!}" class="modal">
								<div class="modal-content">
									<h4>Atención!!</h4>
									<p>{!!$pedido->estado->info1!!}</p>
								</div>
								<div class="modal-footer">
									<a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
								</div>
							</div>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection
@section('js')
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.modal');
		var instances = M.Modal.init(elems, options);
	});

	// Or with jQuery

	$(document).ready(function() {
		$('.modal').modal();
	});
</script>
@endsection