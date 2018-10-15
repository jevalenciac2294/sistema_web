@extends('layouts.app')

@section('main-content')

@if(count($permisos)==0)
<p>usuario no tiene ningun permiso</p>
@else
<section  id="contenido_principal">
    @if(!empty($permisos['crear_vehiculo']))
    
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Crear Vehiculos</h4>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<div class="panel-body">
        
    <form  method="post" action="{{url('createVehiculo')}}">
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="matricula" class="control-label">Matricula</label>
            <input type="text" name="matricula" class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="marca" class="control-label">Marca</label>
            <input type="text" name="marca"  class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="modelo" class="control-label">Modelo</label>
            <input type="text" name="modelo"  class="form-control" required>
            
        </div>
        <div class="form-group">
            <label for="color" class="control-label">Color</label>
            <input type="text" name="color" class="form-control" required>
            
        </div>
                
        <div class="form-group"  align="right">
            <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Registrar Vehiculo ">
        </div>
        </div>
    </form>
</div></div></div>

@else
<p>el usuario no tiene permisos</p>
@endif

</div></section>
@endif


@endsection