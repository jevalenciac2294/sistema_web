<script src="{{asset('js/vehiculoscript.js')}}"></script>
<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.home')

@section('htmlheader_title')
	
@endsection


@section('main-content')

<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Empleados</h4>	        
        <form   action="{{ url('buscar_usuario') }}"  method="post"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">
					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="buscar" >
					</span>

				</div>
						
        </form>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
<!--              <a href="{{url('admin/createuser')}}" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="{{url('admin/crear_rol')}}" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>   -->                              

              <a href="{{url('indexVehiculo')}}"  class="btn btn-xs btn-primary" >Listado Vehiculos</a> 

		</div>

<table class="table table-striped">
    <thead>
        <th>    id       </th>
        <th>    matricula  </th>
        <th>    marca  </th>
        <th>    modelo  </th>
        <th>    color  </th>
               
    </thead>
    <tbody>
        @foreach($vehiculo as $vehiculo)
       <tr>
        <td> {{$vehiculo->id}}</td>
        <td>{{$vehiculo->matricula}}</td>
        <td>{{$vehiculo->marca}}</td>
        <td>{{$vehiculo->modelo}}</td>
        <td>{{$vehiculo->color}}</td>      
        <td>
            
        <td><a href="{{ url('editVehiculo', [$vehiculo->id]) }}" class="btn btn-danger">Editar</a>    
        <td><a class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="listarRuta('{{url('obtenerRutas')}}','{{url('asignarutasvehiculo')}}', '{{$vehiculo->id}}', '{{ url('/indexubicacion') }}')">Asignar ruta</a>
        <td><a href="{{ url('destroyVehiculo', [$vehiculo->id]) }}" class="btn btn-warning">Eliminar</a>
        </td>
       </tr>
    </tbody> 
    @endforeach;
    
    
</table>
</div>
</div>    


<!--<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              
</label> 

</div>
-->
 </div>
</div></section>
@endsection