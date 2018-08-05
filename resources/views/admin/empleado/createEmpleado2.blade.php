@extends('layouts.home')
@section('content')

<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>

<div class="panel-body">
        
    <form  method="POST" action="{{url('createEmpleado')}}">
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="name" class="control-label">Nombre</label>
            <input type="text" name="name" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="apellidos" class="control-label">Apellidos</label>
            <input type="text" name="apellidoS"  class="form-control">
            
        </div>
        <div class="form-group">
            <label for="documento" class="control-label">Numero de Documento</label>
            <input type="text" name="documento"  class="form-control">
            
        </div>
        <div class="form-group">
            <label for="email" class="control-label">email</label>
            <input type="email" name="email" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="direccion" class="control-label">Direccion</label>
            <input type="text" name="direccion" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="telefono" class="control-label">Telefono</label>
            <input type="text" name="telefono" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="sueldo" class="control-label">Sueldo</label>
            <input type="text" name="sueldo" class="form-control">
            
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Registrar empleado conductor
                </button>
            </div>
        </div>
    </form>
</div>

@endsection