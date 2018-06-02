@extends('layouts.home')
@section('content')

<div class="text-info" Style="padding-top: 40px">
<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
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
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Registrar Vehiculo</button>
            </div>
        </div>
    </form>
</div>

@endsection