<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="">
        <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
        <div class="container" style="width: 89%;">
            <div class="row">
                <div class="contenedor" style="text-align: left;float: left!important; padding-top: 5px;">
                    <img src="{{asset('img/person.png')}}" />
                </div>
                <div class="contenedor  item-flex" style="height: 32px;float: left!important;text-transform: uppercase;">
                    <a href="areaclientes.php?active=area" style="color: #F04596" class="fuente-barra <?php if(isset($_GET['active']) && $_GET['active'] == 'area'){ echo 'active-barra';} ?>">&nbsp;&nbsp; BIENVENIDO, {{Auth()->user()->username }} DE
                        HURLINGAM <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-transform: capitalize;line-height: 125%;color: #595959">
                            &nbsp;&nbsp; (Cerrar Sesión)
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form> </a>
                </div>
                <div class="contenedor back-rosa" style="width: 43px;height: 32px; margin-left: 10px;">
                    <a href="http://antoniobaccarelli.com.ar/buscar.php?active=buscar"><img alt="" src="{{asset('img/lupa.png')}}" /></a>
                </div>
                <div class="contenedor" style="padding-top: 10px;">
                    <a href="https://visualizer.antoniobaccarelli.com.ar/" class="fuente-barra" style="text-decoration: none; margin-left: 8px;">
                        <img src="{{asset('img/neo.png')}}" />
                    </a>
                </div>
                <div class="contenedor  item-flex" style="height: 32px;margin-right: -5px;">
                    <a href="https://visualizer.antoniobaccarelli.com.ar/" class="fuente-barra" style="text-decoration: none; margin-left: 8px;">VISUALIZADOR &nbsp; </a>
                </div>
                <div class="contenedor" style="padding-top: 10px;">
                    <img src="{{asset('img/ojo.png')}}" />
                </div>
                <div class="contenedor  item-flex" style="height: 32px;margin-right: -5px;">
                    <a href="{{ url('/adm_tienda/dashboard_tienda') }}" class="fuente-barra" style="text-decoration: none; margin-left: 8px;">ADM &nbsp; </a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar_principal navbar-default navbar-fixed-top" role="navigation" style="">
        <div class="container" style="width: 89%;">
            <ul class="navb fuenteO hidden-xs">
                <div class="container-flex">

                    <li class=" item-flex">
                        @if ($activo=='presupuestos')
                        <a href="{{route('tienda.presupuestos')}}" style="color: #F04596!important;" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'accesorios'){ echo 'active-link';} ?>">
                            PRESUPUESTOS
                        </a>
                        @else
                        <a href="{{route('tienda.presupuestos')}}" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'accesorios'){ echo 'active-link';} ?>">
                            PRESUPUESTOS
                        </a>
                        @endif
                    </li>
                    <li class=" item-flex"><a href="index.php"><img alt="" class="responsive-img" src="{{asset($user->tienda->logo)}}" style="width: 120px;height: 40px;" /></a></li>
                    <li class=" item-flex">
                        @if ($activo=='pedidos')
                        <a href="{{route('pedidostienda.index')}}" style="color: #F04596!important;" href="" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'trabajos'){ echo 'active-link';} ?>">
                            PEDIDOS
                        </a>
                        @else
                        <a href="{{route('pedidostienda.index')}}" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'accesorios'){ echo 'active-link';} ?>">
                            PEDIDOS
                        </a>
                        @endif
                    </li>
                </div>
            </ul>
        </div>


    </nav>
</header>