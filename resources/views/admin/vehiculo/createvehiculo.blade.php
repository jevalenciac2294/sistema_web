@extends('layouts.app')

@section('main-content')


<section  id="contenido_principal">

<!---->
<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>

    
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Crear Vehiculos</h4>
            <ol class="breadcrumb">
                <li><a href="{{url('indexVehiculos')}}">Vehiculos</a></li>
                <li class="active">Crear Vehiculos</li>
            </ol> 
        <div class="table-responsi
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



</div></section>



@endsection