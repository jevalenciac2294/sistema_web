<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')



<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">


<form class="navbar-form navbar-right" role="reporte_Ruta_Conductor" method="post" action="{{url('reporte_Ruta_Conductor')}}">
    {{csrf_field()}}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
    <div class="col-md-7">
                <label for="" > Buscar Empleado</label>
                <input type="text" class="form-control" name='keyword' id="keyword" placeholder="Buscar" />
                      
    </div>        
            
<br>
            <button type="submit" class="btn btn-sm btn-primary">Buscar</button>    
</form>
        <div class="margin" id="botones_control">

              @if('home.rutas_conductor') 
              <a href="{{url('generarpdfrutas_conductor')}}"  class="btn btn-xs btn-primary" >Listado PDF empleados por rutas</a> 
              @endif

        </div>


    </div>          
        <div class="table-responsive" >
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>
        <th>    Nombre Empleado  </th>
        <th>    Ruta  </th>
    </thead>
    <tbody>
        @foreach($datos as $empleados)       <tr>

  
        <td>{{$empleados['name']}}</td>
        <td>{{$empleados['nombre_ruta']}}</td>
   
   
         @endforeach
<!---->
    </tbody>

</table>


</div>


</section>
@endsection