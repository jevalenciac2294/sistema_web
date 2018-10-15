<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{url()}}">Sistema</a>
        
        </div>


        <ul class="nav navbar-nav navbar-right">
                
          @if (Auth::check())
        <li><a href="{{url('user')}}">{{Auth::user()->name}}</a></li>
            @if (Auth::user()->user == 1)
<!--    <div class="panel-heading">-->
      <li><a data-toggle="collapse" href="#collapse1" style="font-weight: bold;">Crear Usuarios
        <span class="caret"></span></a>
        <div id="collapse1" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('admin/createadmin')}}" class="list-group-item">Crear usuario</a>
            
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse2" style="font-weight: bold;">Empleado
        <span class="caret"></span></a>
        <div id="collapse2" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('createEmpleado')}}" class="list-group-item">Crear empleado</a>
            <a href="{{url('indexEmpleado')}}" class="list-group-item">Ver empleados</a>
        </div>
      </li>
<!--      <li style="font-weight: bold;"><a data-toggle="collapse" href="#collapse2">Crear Usuarios prueba 2
        <span class="caret"></span></a>
        <ul id="collapse2" class="panel-collapse collapse dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>-->
      
<!--    </div>-->
 <div id="collaps3" class="panel-collapse collapse">
        <li><li><a href="{{url('admin/createadmin')}}">Crear usuario administrador</a></li>
        <li><li><a href="{{url('admin/createuser')}}">Crear usuario</a></li>

        </div>   <li><a href="{{url('admin')}}">Panel de Administrador</a></li>
            @endif
            <li class='active'><a href="{{url('auth/logout')}}">Salir</a></li>
        @else
            <li><li><a href="{{url('auth/login')}}">Iniciar sesión</a></li>
        @endif
        </ul>
    </div>

</nav>

