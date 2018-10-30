<script src="{{asset('js/plusis.js')}}"></script>


@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')

<section  id="contenido_principal">

<<<<<<< HEAD
<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
=======
>>>>>>> origin/master
    
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Editar Vehiculos</h4>
<<<<<<< HEAD

            <ol class="breadcrumb">
                <li><a href="{{url('indexVehiculos')}}">Vehiculos</a></li>
                <li class="active">Editar Vehiculos</li>
            </ol> 
=======
>>>>>>> origin/master
        <div class="table-responsive" >
            
        <div class="margin" id="botones_control">
        </div>
<div class="panel-body">

        <form method="POST" action="{{url('updateVehiculo', [$vehiculo->id])}}">
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
        <input type="submit" class="btn btn-primary" value="Editar Vehiculo ">
        </div>
        </div>
    </form>
</div></div></div>



</div></section>
@endsection