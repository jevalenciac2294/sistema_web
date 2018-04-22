<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <script src="//github.hubspot.com/tether/dist/js/tether.js"></script>
        <link rel='stylesheet' type='text/css' href='{{url()}}/bootstrap/css/bootstrap.min.css' />
        <script type='text/javascript' src='{{url()}}/bootstrap/js/jquery.js'>
        </script>
        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>
    </head>
    <body>
        
        @extends('layouts.navbar')
                 

        <div class="container" style="padding-top: 40px ">
            @yield('content')
            
        </div>
    </body>
</html>
