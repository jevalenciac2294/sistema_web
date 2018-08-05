<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        
<!--        
        <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:17.09%">
              <div class="w3-dropdown-hover" align="center">FUNCIONES</div> 
  <div class="w3-dropdown-hover">
    <button class="w3-button">USUARIOS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="{{ url('admin/index') }}" class="w3-bar-item w3-button">INDEX USUARIOS</a>
    </div>
  </div> 
  <div class="w3-dropdown-hover">
    <button class="w3-button">CONDUCTORES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="{{ url('indexEmpleado') }}" class="w3-bar-item w3-button">INDEX CONDUCTORES</a>
      
    </div>
  </div>  

  <div class="w3-dropdown-hover">
    <button class="w3-button">VEHICULOS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="{{ url('indexVehiculo') }}" class="w3-bar-item w3-button">INDEX VEHICULOS</a>
      
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">RUTAS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="{{ url('rutaindex') }}" class="w3-bar-item w3-button">INDEX RUTAS</a>
      
    </div>
  </div>
        
</div> -----------------------------------------------------       -->

<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>USUARIOS</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu">
                    <li>
                    <a href="{{ url('admin/index') }}">USUARIOS</a>

                    </li>
                    <li>
                    <a href="{{ url('admin/createadmin') }}">CREAR USUARIO ADMIN</a>

                    </li>
                    
                    <li>
                        <a href="{{url('admin/createuser')}}">CREAR USUARIO</a>
                    </li>
                </ul>
        </li>
        
        <li class="treeview">
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>CONDUCTORES</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu2">
                    <li>
                    <a href="{{ url('indexEmpleado') }}">CONDUCTORES</a>
                    </li>

                    <li>
                        <a href="{{url('createEmpleado')}}">CREAR CONDUCTORES</a>
                    </li>
                </ul>
        </li>
        <li class="treeview">
          <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>VEHICULOS</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu3">

                    <li>
                        <a href="{{url('indexVehiculo')}}">VER VEHICULOS</a>
                    </li>
                    <li>
                        <a href="{{url('createVehiculo')}}">CREAR VEHICULOS</a>
                    </li>
                </ul>
        </li>
        <li class="treeview">
          <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>RUTAS</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu4">
                    <li>
                    <a href="{{ url('rutaindex') }}">INDEX RUTAS</a>
                    </li>
                    <li>
                        <a href="{{url('rutacreate')}}">CREAR RUTAS</a>
                    </li>
<!--                    <li>
                        <a href="{{url('rutaindex')}}">lISTADO DE RUTAS</a>
                    </li>-->
                </ul>
        </li>
</ul>
<!--<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
        </li>
        
        <li class="treeview">
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">
              <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
            </span>
          </a>
           <ul class="treeview-menu" id="homeSubmenu2">
                    <li>
                        <a href="#">Home1 1</a>
                    </li>
                    <li>
                        <a href="#">Home1 2</a>
                    </li>
                    <li>
                        <a href="#">Home1 3</a>
                    </li>
                </ul>
        </li>
</ul>-->

<!--

<ul class="sidebar-menu">
          <li class="treeview {!! Request::is('person/*/Personal') ? 'active' : '' !!}">
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
<ul class="collapse list-unstyled" id="pageSubmenu">
    <li>
        <a href="#">Page 1</a>
    </li>
    <li>
        <a href="#">Page 2</a>
    </li>
    <li>
        <a href="#">Page 3</a>
    </li>
</ul>
       </li>
</ul>
-->


<!--       <ul class="sidebar-menu">
 
<li class="header">MAIN NAVIGATION</li>

<li class="treeview">

            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">Home
               <span class="pull-right-container">
                   <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
              <i class="fa fa-angle-left pull-right-container"></i>
            </span>
    </a>
                <ul class="treeview-menu" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
       </ul>
-->

<!--            <li class="active">
                <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">About
               <span class="pull-right-container">
               <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
              <i class="fa fa-angle-left pull-right-container"></i>
            </span>
    </a>
                <ul class="treeview-menu" id="homeSubmenu2">
                    <li>
                        <a href="#">About 1</a>
                    </li>
                    <li>
                        <a href="#">About 2</a>
                    </li>
                    <li>
                        <a href="#">About 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="fa fa-dashboard">Porta
               <span class="pull-right-container">
                   <i class="fa fa-angle-left" onClick="($(this)[0].className == 'fa fa-angle-left')?$(this)[0].className='fa fa-angle-down':$(this)[0].className='fa fa-angle-left'" style="float: right !important;"></i>
              <i class="fa fa-angle-left pull-right-container"></i>
            </span>
    </a>
                <ul class="treeview-menu" id="homeSubmenu3">
                    <li>
                        <a href="#">Porta 1</a>
                    </li>
                    <li>
                        <a href="#">Porta 2</a>
                    </li>
                    <li>
                        <a href="#">Porta 3</a>
                    </li>
                </ul>
            </li>
            -->

        <!-- Sidebar Menu -->
<!--        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">
                <a href="#">
                    <span>A - level 1</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="#">
                            <span>A - level 2</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="#">A - level 3</a></li>
                            <li><a href="#">A - level 3 - 2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>B - level 1</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>-->

<!--  --------------------------------      <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            
            <li class="treeview">
                <a href="{{ url('admin/index') }}"><i class='fa fa-users'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/index') }}">Listado Usuarios</a></li>
                    <li><a href="###">prueba1</a></li>
                </ul>
            </li>
                
            <li class="treeview">
                <a href="{{ url('indexEmpleado') }}"><i class='fa fa-users'></i> <span>Empleados</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('empleado/indexEmpleado') }}">Listado Usuarios</a></li>
                    <li><a href="###"></a>prueba2</li>
                </ul>
            </li>
        </ul> /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>