<script src="{{asset('js/empleadovehiculoscript.js')}}"></script>
<script src="{{asset('js/plusis.js')}}"></script>
@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection


@section('main-content')



<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Empleados</h4>	

            <ol class="breadcrumb">
                <li><a href="{{url('user')}}">Inicio</a></li>
                <li class="active">Ver Empleados</li>
            </ol> 
        
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
              @if('empleado.indexEmpleado')
              <a href="{{url('indexEmpleado')}}"  class="btn btn-xs btn-primary" >Listado Empleados</a> 
              @endif
              @if('empleado.indexEmpleado')
              <a href="{{url('generarpdfempleados')}}"  class="btn btn-xs btn-primary" >Listado PDF Empleados</a> 
              @endif

		</div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
    <thead>
        <th>    Id  </th>
        <th>    Nombre  </th>
        <th>    Apellidos  </th>
        <th>    Documento  </th>
        <th>    Correo  </th>
        <th>    Direccion  </th>
        <th>    Telefono  </th>
        <th>    Saldo  </th>
        
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


        @if('empleado.editEmpleado')
        <td><a href="{{ url('editEmpleado', [$empleados->id]) }}" class="btn btn-danger">Editar</a></td>
 
        @endif
        @if('empleadoVehiculo.asignaempleadovehiculo')

        <td><a class="btn btn-info" data-toggle="modal" data-target="#myModal1" onclick="listarVehiculo('{{url('obtenerVehiculo')}}','{{url('asignaempleadovehiculo')}}', '{{$empleados->id}}', '{{ url('indexVehiculo') }}')">Asignar vehiculo</a></td>


        @if('empleado.editEmpleado')
        <td  width="10px"><a href="{{ url('editEmpleado', [$empleados->id]) }}" class="btn btn-danger">Editar</a></td>
 
        @endif
        @if('empleadoVehiculo.asignaempleadovehiculo')

        <td  width="10px"><a class="btn btn-info" data-toggle="modal" data-target="#myModal1" onclick="listarVehiculo('{{url('obtenerVehiculo')}}','{{url('asignaempleadovehiculo')}}', '{{$empleados->id}}', '{{ url('indexVehiculo') }}')">Asignar vehiculo</a></td>


        @endif
        
        @if('empleado.destroyEmpleado')


         <td  width="10px"><a href="{{ url('destroyEmpleado', [$empleados->id]) }}" class="btn btn-warning">Eliminar</a>

         <td><a href="{{ url('destroyEmpleado', [$empleados->id]) }}" class="btn btn-warning">Eliminar</a>
<!---->     
        </td>
        @endif
              
       </tr>
    @endforeach
    </tbody>

</table>
            

{!! $empleado->render()!!}
</div>
</div>    


<!--<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              
</label> 

</div>
-->

</div>

</section>

@endsection