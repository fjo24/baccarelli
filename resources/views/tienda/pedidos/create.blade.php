@extends('tienda.templates.cuerpo_cotizador')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet" />
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet" />
<style type="text/css">
    input[disabled=true] {
        background-color: transparent;
        cursor: default;
    }
</style>
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
    {!!Form::open(['route'=>'pedidostienda.store', 'method'=>'POST', 'files' => true])!!}
    <div class="row" style="margin-top: 4%;">
        <!--<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default" style="border-radius: 6px">
					<div class="panel-heading">
						<span class="presupuesto">
							Presupuesto
						</span>
					</div>
					<div class="panel-body">
						<span class="card-title">
						</span>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<div class="input_presupuesto col-md-3">
										{!!Form::label('Fecha de elaboración')!!}
									</div>
									<div class="input-campo col-md-9">
										{!!Form::text('fecha',$fecha,['class'=>'input_disabled', 'disabled'])!!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="input_presupuesto col-md-3">
										{!!Form::label('Lista de precios')!!}
									</div>
									<div class="input-campo col-md-9">
										{!!Form::text('listado_id',$lista,['class'=>'input_disabled', 'disabled'])!!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="input_presupuesto col-md-3">
										{!!Form::label('Número del presupuesto')!!}
									</div>
									<div class="input-campo col-md-9">
										{!!Form::text('numero_presupuesto',$num_pre,['class'=>'input_disabled', 'disabled'])!!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="input_presupuesto col-md-2">
										{!!Form::label('N° de proyecto')!!}
									</div>
									<div class="input-campo col-md-10">
										{!!Form::text('numero_proyecto',null,['class'=>'form_login'])!!}
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
					<div class="panel-heading">
						<span class="presupuesto">
							Cliente
						</span>
					</div>
					<div class="panel-body">
						<span class="card-title">
						</span>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="col-md-2">
										{!!Form::label('Cliente')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('apellido_cliente',null,['class'=>'form_login', 'placeholder' => 'Apellido'])!!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Cliente')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('nombre_cliente',null,['class'=>'form_login', 'placeholder' => 'Nombres'])!!}
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Localidad')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('localidad',null,['class'=>'form_login', 'placeholder' => 'Localidad de la obra'])!!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Dirección')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('direccion',null,['class'=>'form_login', 'placeholder' => 'Dirección de la obra'])!!}
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Telefonos')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::number('telefono1',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 1'])!!}
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::number('telefono2',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 2'])!!}
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::number('telefono3',null,['class'=>'form_login', 'placeholder' => 'Teléfono del cliente 3'])!!}
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Encargado')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('encargado',null,['class'=>'form_login', 'placeholder' => 'Nombre y Apellido del encargado de la obra'])!!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Encargado')!!}
									</div>
									<div class="input-cliente col-md-10">
										{!!Form::text('telefono_encargado',null,['class'=>'form_login', 'placeholder' => 'Teléfono del encargado de la obra'])!!}
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Dias de entrega')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										<span>
											Completar los campos que correspondan
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-cliente col-md-2">
										{!!Form::label('Horarios de entrega')!!}
										{!!Form::label('*', '*', ['class' => 'rojo'])!!}
									</div>
									<div class="input-cliente col-md-10">
										<span>
											Completar los campos que correspondan
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="col-md-2 input-cliente">
									</div>
									<div class="input-cliente col-md-8">
										@foreach($horarios as $horario)
										<div class="input-cliente col-md-6">
											<p>
												<label>
													<input class="filled-in" name="horario_id[]" type="checkbox" value="{!!$horario->id!!}"/>
													<span>
														{!!$horario->horario!!}
													</span>
												</label>
											</p>
										</div>
										@endforeach
									</div>
									<div class="col-md-2 input-cliente">
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-2 input-cliente">
									</div>
									<div class="input-cliente col-md-8">
										@foreach($dias as $dia)
										<div class="input-cliente col-md-6" style="    height: 30px;">
											<p>
												<label>
													<input class="filled-in" name="dia_id[]" type="checkbox" value="{!!$dia->id!!}"/>
													<span>
														{!!$dia->dia!!}
													</span>
												</label>
											</p>
										</div>
										@endforeach
									</div>
									<div class="col-md-2 input-cliente">
									</div>
								</div>
							</div>
							<div class="col-md-12" style="margin-bottom: 1%;">
								<div class="col-md-6">
									<div class="input-cliente col-md-2" style="padding: 0;">
										{!!Form::label('Restricciones')!!}
									</div>
									<div class="input-cliente col-md-10">
										<span>
											Completar los campos que correspondan
										</span>
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									@foreach($restricciones as $restriccion)
									<div class="input-restriccion col-md-2">
									</div>
									<div class="input-restriccion col-md-10">
										<p>
											<label>
												<input class="filled-in" name="restriccion_id[]" type="checkbox" value="{{$restriccion->id}}"/>
												<span style="width: 430px;">
													{!!Form::text('especificacion[]','',['class'=>'form_login', 'placeholder' => $restriccion->nombre])!!}
												</span>
											</label>
										</p>
									</div>
									@endforeach
								</div>
								<div class="col-md-6">
									@foreach($requeridas as $requerida)
									<div class="input-requerida col-md-2">
									</div>
									<div class="input-requerida col-md-10">
										<p>
											<label>
												<input class="filled-in" name="requerida_id[]" type="checkbox" value="{{$requerida->id}}"/>
												<span style="width: 430px;">
													{!!$requerida->nombre!!}
												</span>
											</label>
										</p>
										<p>
											<span style="width: 430px;">
												{!!Form::text('drequerida[]','',['class'=>'form_login', 'placeholder' => $requerida->descripcion])!!}
											</span>
										</p>
									</div>
									@endforeach
								</div>
							</div>
							<div class="col-md-12">
								<div class="col l1 m1 s1 input-cliente">
									<label class="" for="aclaracion">
										Aclaraciones
									</label>
								</div>
								<div class="input-cliente col-md-11">
									<textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 160px!important;">
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
        <div class="row">
            <div class="col-md-12 item-general" style="margin-bottom: 4%;">
                <div class="panel panel-default" style="border-radius: 6px; margin-bottom: 0px;">
                    <div class="panel-heading" style="background-color: #8592A6;">
                        <span class="presupuesto" style="color: white;">Item</span>
                        <input type="text" class="nombre-item" name="nombre-item[]" style="border: 1px solid #ccc; margin-left: 15px;">
                    </div>
                    <div class="panel-heading">
                        <span class="presupuesto">Material <e class="item-label"></e></span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0; border-bottom: 1px solid #ddd;">
                        <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                            <div class="box-header">
                                <h3 class="box-title">Seleccione producto o servicio</h3>
                            </div>
                            <!------------------------------------------------------formulario-------------------------------------------------------->
                            <div class="contacts" style="overflow: hidden;">
                                <div style="width: 100%;overflow: hidden;">
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                        <label>Pieza</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 1%;width: 12%;">
                                        <label>Material</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 0%;padding-right: 1%;width: 11%;">
                                        <label>Observaciones</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 0%;padding-right: 0%;width: 8%;">
                                        <label>Existencia</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <label>Largo</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <label>Ancho</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <label>M2</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <label>Precio Mat</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <label>Adicional</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <label>Precio adic</label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <label>Monto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contacts" style="overflow: hidden;">
                                <div class="material-individual" style="overflow: hidden;">
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                        {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control select-product pieza-material', 'required']) !!}
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 1%;width: 12%;">
                                        {!! Form::select('material_id[]', $materiales, null, ['class' => 'form-control select-product material-perse', 'placeholder' => '', 'required']) !!}
                                    </div>
                                    <div class="col-md-1" style="padding-left: 0%;padding-right: 1%;width: 11%;">
                                        <input name="observaciones_id[]" class="form-control producto-price observacion-material" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 0%;padding-right: 0%;width: 8%;">
                                        <input name="stock_id[]" class="form-control producto-price existencia-material" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <input type="number" name="largo[]" class="form-control producto-quantity largo-material" min="1">
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <input type="number" name="ancho[]" class="form-control producto-quantity ancho-material" min="1">
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                        <input name="cuadrados[]" class="form-control producto-quantity cuadrados-material" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price precio-material', 'placeholder' => 'precio', 'disabled' => 'true']) !!}
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <label class="form-control">
                                            <input type="checkbox" class="suma-material" name="suma[]" disabled="true">
                                            <input type="text" class="taza-material" name="adicional[]" style="width: 50px; border-width: 0px;" disabled="true">
                                        </label>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <input name="'product_cost[]" class="form-control producto-price adicional-material" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 9%;">
                                        <input name="'product_cost[]" class="form-control producto-price monto-material" disabled>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden;">
                                <div class="col-md-1 pull-right">
                                    <button class="btn btn-success agregar-material" type="button">Agregar</button>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden; padding-right: 15px;">
                                <div class="pull-right" style="border-bottom: 1px solid #333;padding-top: 15px;">
                                    <label>Subtotal Material <e class="item-label"></e> $</label>
                                    <input type="text" name="subtotal-material[]" class="subtotal-material" style="border-width: 0px; width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading" style="border-radius: 0px">
                        <span class="presupuesto">Terminaciones de borde <e class="item-label"></span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;border-bottom: 1px solid #ddd;">
                        <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                            <div class="contacts" style="width: 100%; overflow: hidden;">
                                <div class="col-md-8">
                                    <label>Terminacion de Borde</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                    <label>Largo</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                    <label>Precio de Material</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                    <label>Monto</label>
                                </div>
                            </div>
                            <div class="contacts" style="overflow: hidden;">
                                <div class="terminacion-individual" style="overflow: hidden; padding-bottom: 10px">
                                    <div class="col-md-8">
                                        {!! Form::select('borde_id[]', $bordes, null, ['class' => 'form-control borde-perse', 'placeholder' => '', 'required']) !!}
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                        <input type="number" min="1" name="largo[]" class="form-control largo-terminacion">
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                        <input name="product_cost[]" class="form-control precio-terminacion" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 11%;">
                                        <input name="product_cost[]" class="form-control monto-terminacion" disabled>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden;">
                                <div class="col-md-1 pull-right" style="padding-top: 5px;">
                                    <button class="btn btn-success agregar-terminacion" type="button">Agregar</button>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden; padding-right: 15px;">
                                <div class="pull-right" style="border-bottom: 1px solid #333;padding-top: 15px;">
                                    <label>Subtotal Terminación <e class="item-label"></e> $</label>
                                    <input type="text" name="subtotal-terminacion[]" class="subtotal-terminacion" style="border-width: 0px; width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading" style="border-radius: 0px">
                        <span class="presupuesto">Trabajos Aplicados <e class="item-label"></span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;border-bottom: 1px solid #ddd;">
                        <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                            <div class="contacts" style="overflow: hidden;">
                                <div class="col-md-7">
                                    <label>Trabajos</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                    <label>Unidad</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                    <label>Cantidad</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                    <label>Precio Unitario</label>
                                </div>
                                <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                    <label>Monto $</label>
                                </div>
                            </div>
                            <div class="contacts" style="overflow: hidden;">
                                <div class="aplicado-individual" style="overflow: hidden; margin-bottom: 10px; width: 100%;">
                                    <div class="col-md-7">
                                        {!! Form::select('aplicados_id[]', $aplicados, null, ['class' => 'form-control aplicado-perse', 'placeholder' => '', 'required']) !!}
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                        <input name="product_cost[]" class="form-control unidad-aplicado" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                        <input type="number" name="largo[]" class="form-control cantidad-aplicado">
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                        <input name="product_cost[]" class="form-control precio-aplicado" disabled>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 1%;padding-right: 0%;width: 10%;">
                                        <input name="product_cost[]" class="form-control monto-aplicado" disabled>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden;">
                                <div class="col-md-1 pull-right" style="padding-top: 5px;">
                                    <button class="btn btn-success agregar-aplicado" type="button">Agregar</button>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden; padding-right: 15px;">
                                <div class="pull-right" style="border-bottom: 1px solid #333;padding-top: 15px;">
                                    <label>Subtotal Trabajos Aplicados <e class="item-label"></e> $</label>
                                    <input type="text" name="subtotal-aplicado[]" class="subtotal-aplicado" style="border-width: 0px; width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading" style="border-radius: 0px">
                        <span class="presupuesto">Trabajos Especiales <e class="item-label"></span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                        <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                            <div class="contacts" style="overflow: hidden;">
                                <div class="col-md-10">
                                    <label>Trabajos</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Monto $</label>
                                </div>
                            </div>
                            <div class="contacts" style="overflow: hidden;">
                                <div class="especial-individual" style="overflow: hidden; width: 100%; margin-bottom: 10px;">
                                    <div class="col-md-10">
                                        {!! Form::select('superficie_id[]', $superficies, null, ['class' => 'form-control superficie-perse', 'placeholder' => '', 'required']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <input name="product_cost[]" class="form-control precio-especial" disabled>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden;">
                                <div class="col-md-1 pull-right" style="padding-top: 5px;">
                                    <button class="btn btn-success agregar-especial" type="button">Agregar</button>
                                </div>
                            </div>
                            <div style="width: 100%; overflow: hidden; padding-right: 15px;">
                                <div class="pull-right" style="border-bottom: 1px solid #333;padding-top: 15px;">
                                    <label>Subtotal Trabajos Especial <e class="item-label"></e> $</label>
                                    <input type="text" name="subtotal-especial[]" class="subtotal-especial" style="border-width: 0px; width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" style="border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;margin-left: 50%;width: 50%; margin-bottom: 0px; border-top-width: 0px;">
                    <div class="panel-heading panel_total_item">
                        <span class="presupuesto" style="color: white;">Presupuesto Item <e class="item-label"></span>
                    </div>
                    <div class="panel-body" style="padding-right: 0;padding-left: 0;background-color: #CDCDCD;">
                        <div class="container" style="width: 100%;padding: 0;">
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="form-group multiple-form-group">
                                    <div class="col-md-8">
                                        <label class="total_item">Superficie</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input style="background-color: transparent;border-width: 0px;" type="" name="" class="subtotal-material">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="form-group multiple-form-group">
                                    <div class="col-md-8">
                                        <label class="total_item">Bordes</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input style="background-color: transparent;border-width: 0px;" type="" name="" class="subtotal-terminacion">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="form-group multiple-form-group">
                                    <div class="col-md-8">
                                        <label class="total_item">Aplicados</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input style="background-color: transparent;border-width: 0px;" type="" name="" class="subtotal-aplicado">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                                <div class="form-group multiple-form-group">
                                    <div class="col-md-8">
                                        <label class="total_item">Especiales</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input style="background-color: transparent;border-width: 0px;" type="" name="" class="subtotal-especial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group multiple-form-group">
                                    <div class="col-md-8" style="padding-right: 0;padding-left: 0;">
                                        <label class="total_item">
                                            <b>SUBTOTAL MATERIAL</b>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input style="background-color: transparent;border-width: 0px;" type="" name="" class="total-item">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 4%;">
                <button class="btn btn-lg btn-success agregar-elemento pull-right" type="button">Agregar Item &plus;</button>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {

                var materialBase = $('.material-individual').clone();
                var terminacionBase = $('.terminacion-individual').clone();
                var aplicadoBase = $('.aplicado-individual').clone();
                var especialBase = $('.especial-individual').clone();
                var generalBase = $('.item-general').clone();
                vincularEventos();

                function vincularEventos() {
                    $('.superficie-perse').off('change').on('change', function(event) {
                        var i = $(this).closest('.especial-individual').index();
                        $.ajax({
                                method: "GET",
                                url: "../../ajax/especial/" + $(this).val()
                            })
                            .done(function(data) {
                                var superficie = JSON.parse(data);
                                $('.precio-especial').eq(i).val(parseFloat(superficie.costo.replace('.', '').replace(',', '.')).toFixed(2));
                                totalEspecial(i);
                            });
                    });

                    //aplicado-----------------------------------------------------

                    $('.cantidad-aplicado').off('change').on('change', function(event) {
                        var i = $(this).closest('.aplicado-individual').index();
                        subtotalAplicado(i);
                    });

                    $('.aplicado-perse').off('change').on('change', function(event) {
                        var i = $(this).closest('.aplicado-individual').index();
                        $.ajax({
                                method: "GET",
                                url: "../../ajax/aplicado/" + $(this).val()
                            })
                            .done(function(data) {
                                var trabajo = JSON.parse(data);
                                $('.precio-aplicado').eq(i).val(parseFloat(trabajo.precio.replace('.', '').replace(',', '.')).toFixed(2));
                                $('.unidad-aplicado').eq(i).val(trabajo.uni);
                                subtotalAplicado(i);
                            });
                    });

                    //borde--------------------------------------------

                    $('.largo-terminacion').off('change').on('change', function(event) {
                        var i = $(this).closest('.terminacion-individual').index();
                        subtotalTerminacion(i);
                    });
                    $('.borde-perse').off('change').on('change', function(event) {
                        var i = $(this).closest('.terminacion-individual').index();
                        $.ajax({
                                method: "GET",
                                url: "../../ajax/borde/" + $(this).val()
                            })
                            .done(function(data) {
                                var borde = JSON.parse(data);
                                $('.precio-terminacion').eq(i).val(parseFloat(borde.precio.replace('.', '').replace(',', '.')).toFixed(2));
                                subtotalTerminacion(i);
                            });
                    });
                    //material--------------------------------------------
                    $('.ancho-material').off('change').on('change', function(event) {
                        var i = $(this).closest('.material-individual').index();
                        var j = $(this).closest('.item-general').index();
                        calcularAdicional(i, j);
                    });
                    $('.largo-material').off('change').on('change', function(event) {
                        var i = $(this).closest('.material-individual').index();
                        var j = $(this).closest('.item-general').index();
                        calcularAdicional(i, j);
                    });
                    $('.suma-material').off('change').on('change', function(event) {
                        var i = $(this).closest('.material-individual').index();
                        var j = $(this).closest('.item-general').index();
                        calcularAdicional(i, j);
                    });
                    $('.nombre-item').off('keyup').on('keyup', function(event) {
                        var label = $(this).val();
                        var j = $(this).closest('.item-general').index();
                        if (label != '') {
                            $('.item-general').eq(j).find('.item-label').html('«' + label + '»');
                        } else {
                            $('.item-general').eq(j).find('.item-label').html('');
                        }
                    });
                    $('.material-perse').off('change').on('change', function(event) {
                        var id = $(this).val();
                        var i = $(this).closest('.material-individual').index();
                        var j = $(this).closest('.item-general').index();
                        $.ajax({
                                method: "GET",
                                url: "../../ajax/material/" + id
                            })
                            .done(function(data) {
                                var material = JSON.parse(data);
                                $('.item-general').eq(j).find('.observacion-material').eq(i).val(material.observacion);
                                $('.item-general').eq(j).find('.existencia-material').eq(i).val(material.existencia);
                                $('.item-general').eq(j).find('.precio-material').eq(i).val(parseFloat(material.precio.replace('.', '').replace(',', '.')).toFixed(2));
                                $('.item-general').eq(j).find('.taza-material').eq(i).val(parseFloat(material.adicional).toFixed(2));
                                if (material.suma) {
                                    $('.item-general').eq(j).find('.suma-material').eq(i).removeAttr('disabled');
                                } else {
                                    var disabled = $('.suma-material').eq(i).attr('disabled');
                                    if (disabled == false || disabled == undefined) {
                                        $('.item-general').eq(j).find('.suma-material').eq(i).attr('disabled', 'true');
                                        $('.item-general').eq(j).find('.suma-material').eq(i).attr('checked', 'true');
                                    }
                                }
                                calcularAdicional(i, j);
                            });
                    });
                }
                //item General ---------------------------------------------------------------------

                $('.agregar-elemento').on('click', function(event) {
                    var j = $('.item-general:last').index();
                    agregarGeneral(j);
                });

                function agregarGeneral(j) {
                    var precio = $('.item-general').eq(j).find('.total-item:last').val();
                    var nombre = $('.item-general').eq(j).find('.nombre-item:first').val();
                    if (nombre != '' && precio != '' && parseFloat(precio) > 0) {
                        generalBase.clone().insertAfter('.item-general:last').show('fast');
                        vincularEventos();
                        return true;
                    }
                }

                function totalItem(index) {
                    var total = 0;
                    var subtotalMaterial = $('.item-general').eq(index).find('.subtotal-material:first').val();
                    if (subtotalMaterial != '') {
                        total = parseFloat(total) + parseFloat(subtotalMaterial);
                    }
                    var subtotalTerminacion = $('.item-general').eq(index).find('.subtotal-terminacion:first').val();
                    if (subtotalTerminacion != '') {
                        total = parseFloat(total) + parseFloat(subtotalTerminacion);
                    }
                    var subtotalAplicado = $('.item-general').eq(index).find('.subtotal-aplicado:first').val();
                    if (subtotalAplicado != '') {
                        total = parseFloat(total) + parseFloat(subtotalAplicado);
                    }
                    var subtotalEspecial = $('.item-general').eq(index).find('.subtotal-especial:first').val()
                    if (subtotalEspecial != '') {
                        total = parseFloat(total) + parseFloat(subtotalEspecial);
                    }
                    $('.item-general').eq(index).find('.total-item').val(total.toFixed(2));
                }

                //Especial------------------------------------

                $('.agregar-especial').on('click', function(event) {
                    var index = $('.item-general:last').index();
                    agregarEspecial(index)
                });

                function agregarEspecial(i) {
                    var precio = $('.precio-especial').eq(i).val();
                    if (precio) {
                        especialBase.clone().insertAfter('.especial-individual:last').show('fast');
                        vincularEventos();
                        return true;
                    }
                }

                function totalEspecial(i) {
                    var total = 0;
                    $('.precio-especial').each(function(index) {
                        total += parseFloat($(this).val());
                    });
                    $('.subtotal-especial').val(total.toFixed(2));
                    totalItem(0);
                }

                //Aplicado------------------------------------------------
                $('.agregar-aplicado').on('click', function(event) {

                    var i = $('.aplicado-individual:last').index();
                    agregarAplicado(i)
                });

                function agregarAplicado(i) {
                    var monto = $('.monto-aplicado').eq(i).val();
                    if (monto) {
                        aplicadoBase.clone().insertAfter('.aplicado-individual:last').show('fast');
                        vincularEventos();
                        return true;
                    }
                }

                function totalAplicado(i) {
                    var total = 0;
                    $('.monto-aplicado').each(function(index) {
                        total += parseFloat($(this).val());
                    });
                    $('.subtotal-aplicado').val(total.toFixed(2));
                    totalItem(0);
                }

                function subtotalAplicado(i) {
                    var precio = $('.precio-aplicado').eq(i).val();
                    var cantidad = $('.cantidad-aplicado').eq(i).val();
                    if (precio != '' && cantidad != '') {
                        var num = parseFloat(precio) * parseInt(cantidad);
                        $('.monto-aplicado').eq(i).val(num.toFixed(2));
                        totalAplicado(i);
                    }
                }

                //Borde--------------------------------

                $('.agregar-terminacion').on('click', function(event) {

                    var i = $('.terminacion-individual:last').index();
                    agregarTerminacion(i)
                });

                function agregarTerminacion(i) {
                    var monto = $('.monto-terminacion').eq(i).val();
                    if (monto) {
                        terminacionBase.clone().insertAfter('.terminacion-individual:last').show('fast');
                        vincularEventos();
                        return true;
                    }
                }

                function totalTerminacion(i) {
                    var total = 0;
                    $('.monto-terminacion').each(function(index) {
                        total += parseFloat($(this).val());
                    });
                    $('.subtotal-terminacion').val(total.toFixed(2));
                    totalItem(0);
                }

                function subtotalTerminacion(i) {
                    var precio = $('.precio-terminacion').eq(i).val();
                    var largo = $('.largo-terminacion').eq(i).val();
                    if (precio != '' && largo != '') {
                        var num = parseFloat(precio) * parseFloat(largo);
                        $('.monto-terminacion').eq(i).val(num.toFixed(2));
                        totalTerminacion(i);
                    }
                }

                //MAterial--------------------------------

                $('.agregar-material').on('click', function(event) {
                    var i = $('.material-individual:last').index();
                    var j = $(this).closest('.item-general').index();
                    agregar(i, j);
                });

                function totalMaterial(i, j) {
                    var total = 0;
                    $('.item-general').eq(j).find('.monto-material').each(function(index) {
                        total += parseFloat($(this).val());
                    });
                    $('.item-general').eq(j).find('.subtotal-material').val(total.toFixed(2));
                    totalItem(j);
                }

                function agregar(i) {
                    var pieza = $('.pieza-material').eq(i).val();
                    var material = $('.material-perse').eq(i).val();
                    var cuadrados = $('.cuadrados-material').eq(i).val();
                    if (pieza && material && cuadrados) {
                        materialBase.clone().insertAfter('.material-individual:last').hide();
                        $('.material-individual:last').show('fast');
                        vincularEventos();
                        return true;
                    }
                }

                function calcularAdicional(i, j) {
                    var taza = '';
                    var disabled = $('.item-general').eq(j).find('.suma-material').eq(i).attr('disabled');
                    if (disabled == false || disabled == undefined) {
                        if ($('.item-general').eq(j).find('.suma-material').eq(i).is(":checked")) {
                            taza = $('.taza-material').eq(i).val();
                        } else {
                            $('.item-general').eq(j).find('.adicional-material').eq(i).val('');
                        }
                    } else {
                        taza = $('.item-general').eq(j).find('.taza-material').eq(i).val();
                    }
                    var metros = metrosCuadrados(i, j);
                    if (metros != '' && taza != '') {
                        var num = taza * metros;
                        $('.item-general').eq(j).find('.adicional-material').eq(i).val(num.toFixed(2));
                    }
                    subtotal(i, j);
                }

                function subtotal(i, j) {
                    var precio = $('.item-general').eq(j).find('.precio-material').eq(i).val();
                    var adicional = $('.item-general').eq(j).find('.adicional-material').eq(i).val();
                    if (!adicional) {
                        adicional = 0;
                    }
                    if (precio != '') {
                        var num = parseFloat(precio) + parseFloat(adicional);
                        $('.item-general').eq(j).find('.monto-material').eq(i).val(num.toFixed(2));
                        totalMaterial(i, j);
                    }
                }

                function metrosCuadrados(i, j) {
                    var largo = $('.item-general').eq(j).find('.largo-material').eq(i).val();
                    var ancho = $('.item-general').eq(j).find('.ancho-material').eq(i).val();
                    if (largo != '' && ancho != '') {
                        $('.item-general').eq(j).find('.cuadrados-material').eq(i).val(ancho * largo);
                    }
                    return $('.item-general').eq(j).find('.cuadrados-material').eq(i).val();
                }
            });
        </script>
    </div>
    <div class="col-md-12" style="padding:0;">
        <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
            <div class="panel-heading">
                <span class="presupuesto">
                    Trabajos de Obras Globales
                </span>
            </div>
            <div class="panel-body" style="padding-right: 0;padding-left: 0;">
                <span class="card-title">
                </span>
                <div class="container" style="width: 100%;padding: 0;">
                    <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                        <div class="box-header">
                            <h3 class="box-title">
                            </h3>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="contacts">
                            <div class="form-group multiple-form-group">
                                <div class="col-md-10">
                                    <p>
                                        <label>
                                            Trabajos globales
                                        </label>
                                        <br>
                                        <br>
                                        <label>
                                            <input class="filled-in" name="globales_id[]" type="checkbox" value="" />
                                            <span class="total_item">
                                                Medicion a domicilio sin instalación
                                            </span>
                                        </label>
                                        </br>
                                        </br>
                                    </p>
                                </div>
                                <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                    <label>
                                        Monto $
                                    </label>
                                    <br>
                                    <br>
                                    {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                    <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                    </br>
                                    </br>
                                </div>
                            </div>
                        </div>
                        <div class="contacts">
                            <div class="form-group multiple-form-group">
                                <div class="col-md-10">
                                    <p>
                                        <label>
                                            <input class="filled-in" name="globales_id[]" type="checkbox" value="" />
                                            <span class="total_item">
                                                Instalación a domicilio
                                            </span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                    {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                    <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                </div>
                            </div>
                        </div>
                        <div class="contacts">
                            <div class="form-group multiple-form-group">
                                <div class="col-md-4">
                                    <p>
                                        <label>
                                            <input class="filled-in" name="globales_id[]" type="checkbox" value="a_domicilio" />
                                            <span class="total_item">
                                                Flete a domicilio
                                            </span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::select('localidad_id', $localidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione localidad', 'required']) !!}
                                </div>
                                <div class="col-md-2" style="padding-left: 1%;padding-right: 0%;width: 7%;">
                                    {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio', 'disabled' => 'true', 'id' => 'spTotal']) !!}
                                    <!--   <span>El resultado es: </span> <span id="spTotal"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-6" style="padding:0;">
        <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;">
            <div class="panel-heading panel_total_item" style="background-color: #5CB85C!important;">
                <span class="presupuesto" style="color: white;">
                    Presupuesto Item
                </span>
            </div>
            <div class="panel-body" style="padding-right: 0;padding-left: 0;background-color: #CDCDCD;">
                <div class="container" style="width: 100%;padding: 0;">
                    <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                        <div class="form-group multiple-form-group">
                            <div class="col-md-8">
                                <label class="total_item">
                                    Superficie
                                </label>
                            </div>
                            <div class="col-md-4">
                                <span class="total_item">
                                    $ 22.133
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                        <div class="form-group multiple-form-group">
                            <div class="col-md-8">
                                <label class="total_item">
                                    Bordes
                                </label>
                            </div>
                            <div class="col-md-4">
                                <span class="total_item">
                                    $ 15.440
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-right: 0;padding-left: 0;">
                        <div class="form-group multiple-form-group">
                            <div class="col-md-8">
                                <label class="total_item">
                                    Adicionales
                                </label>
                            </div>
                            <div class="col-md-4">
                                <span class="total_item">
                                    $ 19.436
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group multiple-form-group">
                            <div class="col-md-8" style="padding-right: 0;padding-left: 0;">
                                <label class="total_item">
                                    <b>
                                        SUBTOTAL MATERIAL
                                    </b>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <span class="total_item">
                                    <b>
                                        $ 110.550
                                    </b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
            <div class="panel-heading">
                <span class="presupuesto">
                    Observaciones
                </span>
            </div>
            <div class="panel-body">
                <span class="card-title">
                </span>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                        </div>
                        <div class="input-cliente col-md-11">
                            <div class="tit_cotizador">
                                {!!$contenido->titulo_condiciones!!}
                            </div>
                            <div class="cont_cotizador">
                                {!!$contenido->contenido_condiciones!!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="" for="aclaracion" style="color: #868B92;">
                                Descripción
                            </label>
                        </div>
                        <div class="input-cliente col-md-11">
                            <textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 105px!important;">
							</textarea>
                        </div>
                        <div class="col-md-1">
                            <label class="" for="aclaracion" style="color: #868B92;">
                                Alcances del presupuesto
                            </label>
                        </div>
                        <div class="input-cliente col-md-11">
                            <textarea class="form_login materialize-textarea" name="aclaracion" placeholder="mensaje.." style="height: 105px!important;">
							</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-1">
                        </div>
                        <div class="input-cliente col-md-11">
                            <div class="tit_cotizador">
                                {!!$contenido->titulo_plazos!!}
                            </div>
                            <div class="cont_cotizador">
                                {!!$contenido->contenido_plazos!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-1">
                        </div>
                        <div class="input-cliente col-md-11">
                            <div class="tit_cotizador">
                                {!!$contenido->titulo_aclaraciones!!}
                            </div>
                            <div class="cont_cotizador">
                                {!!$contenido->contenido_aclaraciones!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
            <div class="panel-heading">
                <span class="presupuesto">
                    Cláusulas econónmicas
                </span>
            </div>
            <div class="panel-body">
                <span class="card-title">
                </span>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <label class="" for="aclaracion" style="color: #868B92;">
                                Forma de pago
                            </label>
                        </div>
                        <div class="input-cliente col-md-11">
                            {!!Form::text('formadepago',null,['class'=>'form_login', 'placeholder' => ''])!!}
                        </div>
                        <div class="col-md-1">
                            <label class="" for="aclaracion" style="color: #868B92;">
                                Medios de pago
                            </label>
                        </div>
                        <div class="input-cliente col-md-11">
                            {!!Form::text('formadepago',null,['class'=>'form_login', 'placeholder' => ''])!!}
                        </div>
                        <div class="col-md-1">
                            <label class="" for="aclaracion" style="color: #868B92;">
                                Validez de la oferta
                            </label>
                        </div>
                        <div class="input-cliente col-md-11">
                            {!!Form::text('formadepago',null,['class'=>'form_login', 'placeholder' => ''])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default" style="border-radius: 6px;margin-bottom: 4%;;">
            <div class="panel-heading">
                <span class="presupuesto">
                    Planos
                </span>
            </div>
            <div class="panel-body">
                <span class="card-title">
                </span>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label class="control-label" for="field1">
                                Añadir plano
                            </label>
                        </div>
                        <div class="input-cliente col-md-10">
                            <div class="row">
                                {!!Form::open()!!}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="control-group" id="fields">
                                            <div class="controls">
                                                <div class="entry input-group col-xs-3">
                                                    <input class="btn" name="fields[]" type="file">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-addtwo" type="button">
                                                            <span class="glyphicon glyphicon-plus">
                                                            </span>
                                                        </button>
                                                    </span>
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <a class="left" href="" style="cursor: pointer;">
        <button class="boton_guardar">
            <span>
                Guardar Presupuesto
            </span>
        </button>
    </a>
    <a class="right" href="" style="cursor: pointer;">
        <button class="boton_confirmar" type="submit">
            <span>
                Confirmar Pedido
            </span>
        </button>
    </a>
</div>
{!!Form::close()!!}
<!--
	<span>Valor #1</span>
<input type="text" id="txt_campo_1" onchange="sumar(this.value);" />
<br/ >
<span>Valor #2</span>
<input type="text" id="txt_campo_2" onchange="sumar(this.value);" />
<br/ >
<span>Valor #3</span>
<input type="text" id="txt_campo_3" onchange="sumar(this.value);" />
<br/ >
<span>El resultado es: </span> <span id="spTotal"></span>
</div>
-->
@endsection
@section('js')
<script type="text/javascript">
    //javascript para seccion de planos
    $(function() {
        $(document).on('click', '.btn-addtwo', function(e) {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-addtwo')
                .removeClass('btn-addtwo').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
</script>
@endsection