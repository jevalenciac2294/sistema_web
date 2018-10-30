<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')



<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
     
<<<<<<< HEAD

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

     </div>          
=======
        <form class="navbar-form navbar-right" role="search_ruta_vehiculo" action="{{url('reporte/searchredirect')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                     <div class="form-group">
                         <input type="text" class="form-control" name='search_ruta_vehiculo' placeholder="Buscar ..." />
                     </div>
                         <button type="submit" class="btn btn-default">Buscar</button>
        </form>
               </div>          
>>>>>>> origin/master
   
        <div class="table-responsive" >
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>
<<<<<<< HEAD

=======
        <th>    id  </th>
>>>>>>> origin/master
        <th>    nombre  </th>
        <th>    ruta  </th>
        
    </thead>
    <tbody>

<<<<<<< HEAD
        @foreach($datos as $vr)
            
       <tr>

        <td>{{$vr['matricula']}}</td>
        <td>{{$vr['name']}}</td>     
=======
        @foreach($vehiculo_ruta as $vr)
            
       <tr>

        <td>{{$vr->id}}</td>
        <td>{{$vr->matricula}}</td>
        <td>{{$vr->name}}</td>     
>>>>>>> origin/master
       </tr>

         @endforeach

    </tbody>

</table>


</div>


</section>
@endsection