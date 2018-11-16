@extends('admin.templates.body')
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
<div class="center">
    <a class="" href="{{route('requieremedicion', $pedido->id)}}">
        <button class="boton_datos fondo_verde" style="cursor:pointer!important;">
            REQUIERE MEDICION
        </button>
    </a>
    <a class="" href="{{route('pedidosadmin.index', $pedido->id)}}">
        <button class="boton_datos fondo_rojo" style="cursor:pointer!important;">
            NO REQUIEERE MEDICION-----
        </button>
    </a>
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
