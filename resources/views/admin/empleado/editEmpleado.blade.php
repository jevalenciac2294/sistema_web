
@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')


<section  id="contenido_principal">
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Empleados</h4>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<form method="POST" action="{{url('updateEmpleado', [$empleado->id])}}">
    {!! csrf_field() !!}

    <div class='form-group'>
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ $empleado->name }}" />
    </div>
    
    <div class="form-group">
        <label for="apellidoS">Apellidos:</label>
        <input type="text" name="apellidoS" class="form-control" value="{{ $empleado->apellidoS }}" />
        
    </div>
    
    
        <div class="form-group">
            <label for="documento" class="control-label">Numero de Documento</label>
            <input type="text" name="documento"  class="form-control" value="{{ $empleado->documento }}"/>
            
        </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ $empleado->email }}" />
        
    </div>

    <div class='form-group'>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" class="form-control" value="{{ $empleado->direccion }}" />
        
    </div>

    <div class='form-group'>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" />
        
    </div>

    <div class='form-group'>
        <label for="sueldo">Sueldo:</label>
        <input type="text" name="sueldo" class="form-control" value="{{ $empleado->sueldo }}" />
        
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Guardar Empleado </button>
    </div>
</form>
        
@stop
</div></section>
