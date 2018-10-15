<script src="{{asset('js/empleadovehiculoscript.js')}}"></script>
<script src="{{asset('js/plusis.js')}}"></script>
@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection


@section('main-content')

@if(count($permisos)==0)
<p>usuario no tiene ningun permiso</p>
@else

<section  id="contenido_principal">
@if(!empty($permisos['ver_empleado']))
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Empleados</h4>	        
<!--        <form   action="{{ url('buscar_usuario') }}"  method="post"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">
					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="buscar" >
					</span>

				</div>
						
        </form>-->
<form class="navbar-form navbar-right" role="search" action="{{url('admin/empleado/searchredirect')}}">
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

              <a href="{{url('indexEmpleado')}}"  class="btn btn-xs btn-primary" >Listado Empleados</a> 
              <a href="{{url('generarpdfempleados')}}"  class="btn btn-xs btn-primary" >Listado PDF Empleados</a> 


		</div>
        <div class="table-responsive" >
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>
        <th>    Id  </th>
        <th>    name  </th>
        <th>    apellidos  </th>
        <th>    documento  </th>
        <th>    Correo  </th>
        <th>    direccion  </th>
        <th>    telefono  </th>
        <th>    saldo  </th>
        
    </thead>
    <tbody>
        @foreach($empleado as $empleados)
       <tr>
        <td>{{$empleados->id}}</td>
        <td>{{$empleados->name}}</td>
        <td>{{$empleados->apellidoS}}</td>
        <td>{{$empleados->documento}}</td>      
        <td>{{$empleados->email}}</td>
        <td>{{$empleados->direccion}}</td>
        <td>{{$empleados->telefono}}</td>
        <td>{{$empleados->sueldo}}</td>
        <td>
@if(!empty($permisos['editar_empleado']))
        <td><a href="{{ url('editEmpleado', [$empleados->id]) }}" class="btn btn-danger">Editar</a></td>
@endif   

@if(!empty($permisos['asignar_vehiculo']))
        <td><a class="btn btn-info" data-toggle="modal" data-target="#myModal1" onclick="listarVehiculo('{{url('obtenerVehiculo')}}','{{url('asignaempleadovehiculo')}}', '{{$empleados->id}}', '{{ url('indexVehiculo') }}')">Asignar vehiculo</a>
@endif



@if(!empty($permisos['eliminar_vehiculo']))
        <td><a href="{{ url('destroyEmpleado', [$empleados->id]) }}" class="btn btn-warning">Eliminar</a>
 @endif          
        </td>

       </tr>
    @endforeach
    </tbody>

</table>
            
</div>
{!! $empleado->render()!!}
</div>    


<!--<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              
</label> 

</div>
-->

</div>
@endif 
</section>
@endif
@endsection