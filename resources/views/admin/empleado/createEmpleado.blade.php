<script src="{{asset('js/plusis.js')}}"></script>
@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')


<section  id="contenido_principal">
 

 <div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
<!---->
    
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Crear Empleados</h4>

            <ol class="breadcrumb">
                <li><a href="{{url('user')}}">Inicio</a></li>
                <li><a href="{{url('indexEmpleado')}}">Empleados</a></li>
                <li class="active">Ver Empleados</li>
            </ol> 
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<div class="panel-body">
        
    <form  method="POST" action="{{url('createEmpleado')}}">
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="name" class="control-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="apellidos" class="control-label">Apellidos</label>
            <input type="text" name="apellidoS"  class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="documento" class="control-label">Numero de Documento</label>
            <input type="text" name="documento"  class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="email" class="control-label">email</label>
            <input type="email" name="email" class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="direccion" class="control-label">Direccion</label>
            <input type="text" name="direccion" class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="telefono" class="control-label">Telefono</label>
            <input type="text" name="telefono" class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="sueldo" class="control-label">Sueldo</label>
            <input type="text" name="sueldo" class="form-control" required>
            
        </div>
            <div class="form-group"  align="right">
                <input   type="submit" class="btn btn-primary" value="Registrar conductor">

            </div>
        
    </form>
                </div>
        </div>        </div>

</div>


</div></section>

@endsection