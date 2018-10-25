<header>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
<div class="container" style="width: 89%;">  
        <div class="row" >
          <div class="contenedor" style="text-align: left;float: left!important; padding-top: 5px;">
            <img src="{{asset('img/person.png')}}"/>  
          </div>
          <div class="contenedor  item-flex" style="height: 32px;float: left!important;text-transform: uppercase;">
            <a href="areaclientes.php?active=area" style="color: #F04596" class="fuente-barra <?php if(isset($_GET['active']) && $_GET['active'] == 'area'){ echo 'active-barra';} ?>">&nbsp;&nbsp; BIENVENIDO, {{Auth()->user()->username }}, ADMINISTRADOR <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-transform: capitalize;line-height: 125%;color: #595959">
                          &nbsp;&nbsp; (Cerrar Sesión)
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>   </a>
          </div>
          <div class="contenedor back-rosa" style="width: 43px;height: 32px; margin-left: 10px;">
            <a href="buscar.php?active=buscar"><img alt="" src="{{asset('img/lupa.png')}}"/></a>
          </div>
          <div class="contenedor" style="padding-top: 10px;">
          <a href="https://visualizer.antoniobaccarelli.com.ar/" class= "fuente-barra" style="text-decoration: none; margin-left: 8px;">
            <img src="{{asset('img/neo.png')}}"/> 
            </a> 
          </div>
          <div class="contenedor  item-flex" style="height: 32px;margin-right: -5px;">
            <a href="https://visualizer.antoniobaccarelli.com.ar/" class= "fuente-barra" style="text-decoration: none; margin-left: 8px;">VISUALIZADOR &nbsp; </a>
          </div>
          <div class="contenedor" style="padding-top: 10px;">
            <img src="{{asset('img/ojo.png')}}"/>
          </div> 
          <div class="contenedor  item-flex" style="height: 32px;margin-right: -5px;">
            <a href="{{ url('/adm/dashboard') }}" class= "fuente-barra" style="text-decoration: none; margin-left: 8px;">ADM &nbsp; </a>
          </div>
        </div>
</div>
</nav>
<nav class="navbar_principal navbar-default navbar-fixed-top" role="navigation" style="">     
<div class="container" style="width: 89%;">    
<ul class="navb fuenteO hidden-xs">
    <div class="container-flex">

        <li class=" item-flex"><a href="accesorios.php?active=accesorios" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'accesorios'){ echo 'active-link';} ?>">PRESUPUESTOS</a></li>

        <li class=" item-flex"><a href="index.php"><img class="logo-head" src="{{asset('img/logo/logo-header_10.png')}}"></a></li>

        <li class=" item-flex"><a href="trabajos.php?active=trabajos" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'trabajos'){ echo 'active-link';} ?>">PEDIDOS</a></li>
      
    </div>
</ul>
</div>


</nav>
</header>
