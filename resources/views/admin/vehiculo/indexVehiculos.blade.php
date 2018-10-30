<script src="{{asset('js/vehiculoscript.js')}}"></script>
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
        <h4 class="box-title">Vehiculos</h4>	

            <ol class="breadcrumb">
                <li><a href="user">Inicio</a></li>
                <li class="active">Vehiculos</li>
            </ol>         
=======
        <h4 class="box-title">Vehiculos</h4>	        
>>>>>>> origin/master
<!--        <form   action="{{ url('buscar_usuario') }}"  method="post"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">
					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="buscar" >
					</span>

				</div>
						
        </form>-->

<form class="navbar-form navbar-right" role="search" action="{{url('admin/vehiculo/searchredirect')}}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
 <div class="form-group">
  <input type="text" class="form-control" name='search' placeholder="Buscar ..." />
 </div>
 <button type="submit" class="btn btn-default">Buscar</button>
</form>
            
		<div class="margin" id="botones_control">
<!--              <a href="{{url('admin/createuser')}}" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="{{url('admin/crear_rol')}}" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>   -->                              

              <a href="{{url('indexVehiculos')}}"  class="btn btn-xs btn-primary" >Listado Vehiculos</a> 
              <a href="{{url('generarpdfvehiculos')}}"  class="btn btn-xs btn-primary" >Listado PDF Vehiculos</a> 


		</div>
<<<<<<< HEAD
    <div class="box-body box-white">
    <div class="panel-body">


=======
        <div class="table-responsive" >
>>>>>>> origin/master

<table class="table table-striped">
    <thead>
        <th>    id       </th>
        <th>    matricula  </th>
        <th>    marca  </th>
        <th>    modelo  </th>
        <th>    color  </th>
               
    </thead>
    <tbody>
        @foreach($vehiculo as $vehiculos)
       <tr>
        <td> {{$vehiculos->id}}</td>
        <td>{{$vehiculos->matricula}}</td>
        <td>{{$vehiculos->marca}}</td>
        <td>{{$vehiculos->modelo}}</td>
        <td>{{$vehiculos->color}}</td>      
<<<<<<< HEAD
            
        @if('vehiculo.editVehiculo')
        
        <td  width="10px"><a href="{{ url('editVehiculo', [$vehiculos->id]) }}" class="btn btn-danger">Editar</a>    </td>
=======
        <td>
            
        @if('vehiculo.editVehiculo')
        
        <td><a href="{{ url('editVehiculo', [$vehiculos->id]) }}" class="btn btn-danger">Editar</a>    </td>
>>>>>>> origin/master
 
        
        @endif
        @if('rutasvehiculos.asignarutasvehiculo')
<<<<<<< HEAD
        <td  width="10px"><a class="btn btn-info" data-toggle="modal" data-target="#myModal2" onclick="listarRuta('{{url('obtenerRutas')}}','{{url('asignarutasvehiculo')}}', '{{$vehiculos->id}}', '{{ url('indexubicacion')}}')">Asignar ruta</a></td>
=======
        <td><a class="btn btn-info" data-toggle="modal" data-target="#myModal2" onclick="listarRuta('{{url('obtenerRutas')}}','{{url('asignarutasvehiculo')}}', '{{$vehiculos->id}}', '{{ url('indexubicacion')}}')">Asignar ruta</a></td>
>>>>>>> origin/master

        
        @endif
        @if('vehiculo.destroyVehiculo')
<<<<<<< HEAD
        <td  width="10px"><a href="{{ url('destroyVehiculo', [$vehiculos->id]) }}" class="btn btn-warning">Eliminar</a>
=======
        <td><a href="{{ url('destroyVehiculo', [$vehiculos->id]) }}" class="btn btn-warning">Eliminar</a>
>>>>>>> origin/master

        </td>
        @endif
       </tr>
    </tbody> 
    @endforeach

    
</table>
<<<<<<< HEAD


</div></div>  {!! $vehiculo->render()!!}
  
=======
</div>
{!! $vehiculo->render()!!}
</div>    
>>>>>>> origin/master


<!--<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              
</label> 

</div>
-->
<<<<<<< HEAD

=======
</div>
>>>>>>> origin/master

</section>

@endsection