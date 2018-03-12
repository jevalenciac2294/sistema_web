<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <link rel='stylesheet' type='text/css' href='{{url()}}/bootstrap/css/bootstrap.min.css' />
        <script type='text/javascript' src='{{url()}}/bootstrap/js/jquery.js'>
        </script>
        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>
        
    </head>
    <body>
        
        
            <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">


          <a class="navbar-brand" href="{{url()}}">Sistema</a>
          
          <ul class="nav navbar-nav">
            <a href="{{url()}}">Inicio</a>
          <ul class="nav navbar-nav navbar-right">
   @if (Auth::check())
   <li><a href="{{url()}}">{{Auth::user()->name}}</a></li>
   <br>
   <li><a href="{{url('auth/logout')}}">Salir</a></li>
   @else
            <a href="{{url('auth/login')}}">Iniciar sesión</a>
   @endif
          </ul>
          </ul>
        </div>
       
      </div>
    </nav>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
