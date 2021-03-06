<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>
        Panel de administración - @yield('titulo')
    </title>
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin.css') }}" media="screen,projection" rel="stylesheet" type="text/css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js">
    </script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    </link>
    </link>
    </meta>
    </meta>
    </meta>
    </meta>
    </meta>
</head>

<body>
    <!-- CABECERA -->
    <header>
        <!-- Dropdown Structure -->
        <ul class="dropdown-content" id="dropdown1">
            <li>
                <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('  Cerrar Sesión') }}
                </a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <nav>
            <a class="sidenav-trigger" data-target="slide-out" href="#">
                <i class="material-icons">
                    menu
                </i>
            </a>
            <div class="nav-wrapper">
                <div class="container">
                    <a class="brand-logo" href="#!">
                        @yield('titulo')
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <!-- Dropdown Trigger -->
                        <li>
                            <a class="dropdown-trigger" data-target="dropdown1" href="#!">
                                Bienvenido
                                <i class="material-icons right">
                                    arrow_drop_down
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="sass.html">
                    Sass
                </a>
            </li>
            <li>
                <a href="badges.html">
                    Components
                </a>
            </li>
            <li>
                <a href="collapsible.html">
                    Javascript
                </a>
            </li>
            <li>
                <a href="mobile.html">
                    mama
                </a>
            </li>
        </ul>
        <!-- SIDENAV MENU -->
        <ul class="sidenav sidenav-fixed" id="slide-out">
            <div class="logo">
                <a class="brand-logo" href="" id="logo-container">
                    <img alt="" style="height: 88px!important;" class="responsive-img" src="{{ asset('img/logo/logo-header_10.png') }}">
                    </img>
                </a>
            </div>
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin">
                        <i class="material-icons">
                            account_circle
                        </i>
                        Usuarios
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{route('distribuidorestienda.index')}}">
                                    Usuarios Tienda
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admintiendas.create')}}">
                                    Editar Tienda
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin">
                        <i class="material-icons">
                            account_circle
                        </i>
                        Editar Tienda
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{route('sucursales.index')}}">
                                    Sucursales
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin">
                        <i class="material-icons">
                            account_circle
                        </i>
                        Texto en pedido
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{route('contenido_observaciones_t.create')}}">
                                    Editar Contenido
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </ul>
    </header>
    <main style="">
        <div class="container">
            @yield('contenido')
        </div>
    </main>
    <!--Import jQuery before materialize.js-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
    </script>
    <!-- Materialize Core JavaScript -->
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
    </script>
    @yield('js')
    <script type="text/javascript">
        /*         document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
*/
        // Or with jQuery


        $(document).ready(function() {
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            $('.collapsible').collapsible();

        });
    </script>
</body>

</html>