<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')

@section('htmlheader_title')
	
@endsection


@section('main-content')


<section  id="contenido_principal">

	

<div class="box box-primary box-gris">

    <h3>Resultado de la búsqueda: {{$search}}</h3>
@if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>

@endif
     <div class="box-header">
        <h4 class="box-title">Usuarios</h4>	        


<form class="navbar-form navbar-right" role="search" action="{{url('admin/searchredirect')}}">
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

              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>                                 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
              <a href="{{url('admin/index')}}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 

              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>                                 

                </div>

    </div>

<div class="box-body box-white">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>codigo</th>
								<th>Rol</th>
								<th>Nombre</th>
								<th>Email</th>
							    <th>Acción</th>
						</tr>
				</thead>
	    <tbody>

	    @foreach($users as $user)
		<tr role="row" class="odd">
			<td>{{ $user->id }}</td>
			<td><span class="label label-default">
             
             @foreach($user->getRoles() as $roles)
			 {{  $roles.","  }}
             @endforeach
           
             </span>
			</td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $user->name  }}</a></td>
			<td>{{ $user->email }}</td>
			<td>
			
                        <a class="btn  btn-default btn-xs" onclick="verinfo_usuario({{$user->id }})" style='width:40px; height:15px; background-color: #FAFAFA' ><i class="fa fa-fw fa-edit"></i></a>
                         <a class="btn  btn-default btn-xs"  href="{{ url('admin/destroy', [$user->id]) }}" class="btn btn-warning" style='width:40px; height:15px; color: #FFFFFF; background-color: #FE9A2E' ><i class="fa fa-fw fa-remove"></i></a>
			</td>
		</tr>
	    @endforeach



		</tbody>
		</table>
        
<!--        <div class="container">
            @foreach ($users as $user)
            {{$user->name}}
            @endforeach

	</div>-->
{!! $users->render()!!}
</div>


@if(count($users)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 


@endif
</div>
</div></section>
@endsection