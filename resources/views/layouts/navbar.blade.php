
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{url()}}">Sistemaaaa</a>
        
        </div>


        <ul class="nav navbar-nav navbar-right">

        @if (Auth::check())
                
            <li><a href="#">{{Auth::user()->name}}</a></li>
            @if (Auth::user()->user == 1)
                <li><a href="{{url('admin')}}">Panel de Administrador</a></li>
            @endif
            <li class='active'><a href="{{url('auth/logout')}}">Salir</a></li>
        @else
            <li><li><a href="{{url('auth/login')}}">Iniciar sesión</a></li>
        @endif
        </ul>
    </div>

</nav>