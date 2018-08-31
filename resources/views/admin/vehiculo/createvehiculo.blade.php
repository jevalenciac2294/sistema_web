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
    @if(!empty($permisos['crear_vehiculo']))
    
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Crear Vehiculos</h4>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<div class="panel-body">
        
    <form  method="POST" action="{{url('createVehiculo')}}">
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="matricula" class="control-label">Matricula</label>
            <input type="text" name="matricula" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="marca" class="control-label">Marca</label>
            <input type="text" name="marca"  class="form-control">
            
        </div>
        <div class="form-group">
            <label for="modelo" class="control-label">Modelo</label>
            <input type="text" name="modelo"  class="form-control">
            
        </div>
        <div class="form-group">
            <label for="color" class="control-label">Color</label>
            <input type="text" name="color" class="form-control">
            
        </div>
                
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-info">
                    <i> Registrar vehiculo </i>
                </button>
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