<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{url()}}">Sistema</a>
        
        </div>


        <ul class="nav navbar-nav navbar-right">
                
          @if (Auth::check())
        <li><a href="{{url('user')}}">{{Auth::user()->name}}</a></li>
            @if (Auth::user()->user == 1)

    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1">Crear Usuarios</a></h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
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