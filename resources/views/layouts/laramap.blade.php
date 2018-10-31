<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Mapeo
            </title>
           
        </meta>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
<!--         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
        

            <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
    </head>
    {!! csrf_field() !!}
    
    <body>
        <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkz-BhCJcWq35bx6vEpFTn4KtKYCm-OQE&libraries=places">
        </script>
        @yield('content')
        <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
        </script>
        <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
        
        {{-- Google map api  --}}

        
        
        <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkz-BhCJcWq35bx6vEpFTn4KtKYCm-OQE&libraries=places">
        </script>
        @yield('content')
        <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
        </script>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/ajaxsearch.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
        

        
        
        

        <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
  type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>-->
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/ajaxsearch.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@yield('js')

    </body>
</html>            