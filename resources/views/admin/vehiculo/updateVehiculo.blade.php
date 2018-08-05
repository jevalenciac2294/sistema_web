<script src="{{asset('js/plusis.js')}}"></script>


@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')


<section  id="contenido_principal">
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Editar Vehiculos</h4>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>

<form  method="POST" action="{{url('updateVehiculo', [$vehiculo->id])}}">
    {!! csrf_field() !!}

    <div class='form-group'>
        <label for="matricula" class="control-label">Matricula</label>
        <input type="text" name="matricula" class="form-control" value="{{ $vehiculo->matricula }}" />
    </div>
    
            <div class="form-group">
            <label for="marca" class="control-label">Marca</label>
            <input type="text" name="marca"  class="form-control" value="{{ $vehiculo->marca }}" />
            
        </div>
        <div class="form-group">
            <label for="modelo" class="control-label">Modelo</label>
            <input type="text" name="modelo"  class="form-control" value="{{ $vehiculo->modelo }}" />
            
        </div>
        <div class="form-group">
            <label for="color" class="control-label">Color</label>
            <input type="text" name="color" class="form-control" value="{{ $vehiculo->color }}" />
            
        </div>
    <div>
        <button type="submit" class="btn btn-primary">Guardar Vehiculo </button>
    </div>
</form>
        
@stop
</div></section>
