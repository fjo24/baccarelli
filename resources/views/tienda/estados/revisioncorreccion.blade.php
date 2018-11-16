@extends('tienda.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/presupuesto.css') }}" rel="stylesheet" />
@endsection
@section('contenido')
<div class="container" style="width: 89%;">
    @include('layouts.pedido.tabla')
</div>
<br><br>
<div class="row">
    <div class="col l12 m12 s12">
        <div class="center">
            <a class="" href="">
                <button class="boton_datos fondo_amarillo" style="cursor:pointer!important;">
                    DESCARGAR PEDIDO
                </button>
            </a>
            <a class="" href="{{route('downloadoc', $pedido->id)}}">
                <button class="boton_datos fondo_amarillo" style="cursor:pointer!important;">
                    DESCARGAR OC
                </button>
            </a>
        </div>
    </div>
    <br><br>
    <div class="col l12 m12 s12">
        <div class="center">
            <div class="col l12 m12 s12">
                <span>
                    <h4>
                        Luego de revisado.. Aprueba la correccion realizada?
                    </h4>
                </span>
            </div>
            <br><br>
            <div class="col l12 m12 s12">
                <a class="" href="{{route('revisionaprobada', $pedido->id)}}">
                    <button class="boton_datos fondo_verde" style="cursor:pointer!important;">
                        ESTOY DE ACUERDO
                    </button>
                </a>
                <a class="" href="{{route('noaprobado', $pedido->id)}}">
                    <button class="boton_datos fondo_rojo" style="cursor:pointer!important;">
                        NO ESTOY DE ACUERDO
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    // Activate Next Step

    $(document).ready(function() {

        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

    });


    // Add , Dlelete row dynamically

    $(document).ready(function() {
        var i = 1;
        $("#add_row").click(function() {
            $('#addr' + i).html("<td>" + (i + 1) +
                "</td><td><input name='name[]' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur[]' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email[]' type='text' placeholder='Email'  class='form-control input-md'></td>"
            );

            $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
            i++;
        });
        $("#delete_row").click(function() {
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;
            }
        });

    });
</script>
@endsection
