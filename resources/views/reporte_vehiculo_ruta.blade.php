<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')



<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
     


<form class="navbar-form navbar-right" role="reporte_vehiculo_ruta" method="post" action="{{url('reporte_vehiculo_ruta')}}">
    {{csrf_field()}}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 


    <div class="col-md-8">
                <label for="" > Buscar Matricula</label>
                <input type="text" class="form-control" name='keyword' id="keyword" placeholder="Buscar" />
                     
    </div>
    <br>
     <button type="submit" class="btn btn-sm btn-primary">Buscar</button>  
</form>

       <div class="margin" id="botones_control">

              @if('home.conductores_vehiculos')  
              <a href="{{url('generarpdfvehiculo_rutas')}}"  class="btn btn-xs btn-primary" >Listado PDF vehiculos por rutas</a> 
              @endif

        </div>





     </div>          

   
        <div class="table-responsive" >
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>


        <th>    Matricula  </th>
        <th>    Ruta  </th>
        
    </thead>
    <tbody>

        @foreach($datos as $vr)
            
       <tr>

        <td>{{$vr['matricula']}}</td>
        <td>{{$vr['name']}}</td>     


         @endforeach
<!---->
    </tbody>

</table>


</div>


</section>
@endsection