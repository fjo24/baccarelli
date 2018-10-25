<header>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
<div class="container" style="width: 89%;">  
        <div class="row" >
          <div class="contenedor" style="text-align: left;float: left!important; padding-top: 5px;">
            <img src="{{asset('img/person.png')}}"/>  
          </div>
          <div class="contenedor  item-flex" style="height: 32px;float: left!important;">
            <a href="areaclientes.php?active=area" style="color: #F04596" class="fuente-barra <?php if(isset($_GET['active']) && $_GET['active'] == 'area'){ echo 'active-barra';} ?>">&nbsp;&nbsp; ÁREA CLIENTES   </a>
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
          <div class="contenedor  item-flex" style="height: 32px;">
            <a href="presupuesto.php?active=presupuesto" class= "fuente-barra" style="text-decoration: none; margin-left: 15px;">PRESUPUESTO &nbsp;&nbsp; | &nbsp;&nbsp; </a>
          </div>
          <div class="contenedor item-flex" style="height: 32px; ">
            <a href="contacto.php?active=contact" class= "fuente-barra" style="text-decoration: none; margin-left: 15px;">CONTACTO &nbsp;&nbsp; |</a>
          </div>
                    
        </div>
</div>
</nav>
<nav class="navbar_principal navbar-default navbar-fixed-top" role="navigation" style="">     
<div class="container" style="width: 89%;">    
<ul class="navb fuenteO hidden-xs">
    <div class="container-flex">
      
        <li class=" item-flex"><a href="index.php?active=home" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'home'){ echo 'active-link';} ?>" >HOME</a></li>

        <li class=" item-flex"><a href="material.php?active=materiales" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'materiales'){ echo 'active-link';} ?>">MATERIALES</a></li>

        <li class=" item-flex"><a href="terminaciones.php?active=terminaciones" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'terminaciones'){ echo 'active-link';} ?>">TERMINACIONES</a></li>

        <li class=" item-flex"><a href="accesorios.php?active=accesorios" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'accesorios'){ echo 'active-link';} ?>">ACCESORIOS</a></li>

        <li class=" item-flex"><a href="index.php"><img class="logo-head" src="{{asset('img/logo/logo-header_10.png')}}"></a></li>

        <li class=" item-flex itm-izq"><a href="trabajos.php?active=trabajos" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'trabajos'){ echo 'active-link';} ?>">TRABAJOS REALIZADOS</a></li>

        <li class=" item-flex"><a href="novedades.php?active=novedades" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'novedades'){ echo 'active-link';} ?>">NOVEDADES</a></li>

        <li class=" item-flex"><a href="servicios.php?active=servicios" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'servicios'){ echo 'active-link';} ?>">SERVICIOS</a></li>

        <li class=" item-flex"><a href="empresa.php?active=empresa" class="itm-menu <?php if(isset($_GET['active']) && $_GET['active'] == 'empresa'){ echo 'active-link';} ?>">EMPRESA</a></li>
      
    </div>
</ul>
</div>


</nav>
</header>
