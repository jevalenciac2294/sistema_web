<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

    
    

    @include('layouts.partials.htmlheader')
@show

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--fullcalendar-->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
        
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//github.hubspot.com/tether/dist/js/tether.js"></script>
        <!--<link rel='stylesheet' type='text/css' href='{{url()}}/bootstrap/css/bootstrap.min.css' />-->
<!--        <script type='text/javascript' src='{{url()}}/bootstrap/js/jquery.js'>
        </script>-->
        <!--<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>-->
<!--        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkz-BhCJcWq35bx6vEpFTn4KtKYCm-OQE&libraries=geometry"></script>
        
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>
        
        
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <script src="//github.hubspot.com/tether/dist/js/tether.js"></script>
        
        
        

        <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        
        
        
        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>
        
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!--full calendar-->  



        <!--bootstrap.min.css-->
      <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      
      
 <link rel="stylesheet" type='text/css'  href='{{url()}}/plugins/fullcalendar/fullcalendar.css'>
        <script type='text/javascript' src='{{url()}}/plugins/fullcalendar/lib/jquery.min.js'></script>
        <script type='text/javascript' src='{{url()}}/plugins/fullcalendar/lib/moment.min.js'></script>
        <script type='text/javascript' src='{{url()}}/plugins/fullcalendar/fullcalendar.min.js'></script>
        <script type='text/javascript' src='{{url()}}/plugins/fullcalendar/locale/es.js'></script>
      <!-- Datepicker Files 

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>   -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->

    </head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">

<div style="display: none;" id="cargador_empresa" align="center">
        <br>
         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="{{ url('/img/cargando.gif') }}" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
</div>
<input type="hidden"  id="url_raiz_proyecto" value="{{ url('/') }}" />

<div id="capa_modal" class="div_modal" style="display: none;"></div>
<div id="capa_formularios" class="div_contenido" style="display: none;"></div>


<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
          <div class="modal-body" id="listaRutas">
          <p>Cargando rutas...</p>
         </div>
          <!--<div id="getRequestData"></div>-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<!----------asigna vehiculo-------------->

<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
          <div class="modal-body" id="listaVehiculos">
          <p>Cargando vehiculos...</p>
         </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

    



<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    @include('layouts.partials.footer')

</div><!-- ./wrapper -->
@show



</body>
</html>
