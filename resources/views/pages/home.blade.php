@extends('pages.templates.body')
@section('title', 'Baccarelli')
@section('css')
<link href="{{ asset('css/header_adm.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/general.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="row" style="margin:10% 35%;">
    <div class="col l12 m12 s12">
        <div class="col l6 m6 s6">
            <a href="{{url('/admin')}}">
                <button style="margin-right: 40%;" class="btn waves-effect waves-light pink right" name="action" type="submit">
                    Admin
                </button>
            </a>
        </div>
        <div class="col l6 m6 s6">
            <a href="{{url('/tienda')}}">
                <button style="margin-right: 40%;" class="btn waves-effect waves-light pink right" name="action" type="submit">
                    Tienda
                </button>
            </a>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
</script>
@endsection
