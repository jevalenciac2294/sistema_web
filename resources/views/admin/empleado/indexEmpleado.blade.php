@extends('layouts.home')

@section('content')


<div Style="padding-top: 40px">
</div>
<div class="text-info" Style="padding-top: 40px">
    {!! csrf_field() !!}
    @if(Session::has('message'))
    <div class="text-danger"></div>
    <div class="alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
            
        </button>
        
    </div>
        {{Session::get('message')}}
    @endif
</div>
<table class="table table-striped">
    <thead>
        <th>    Id  </th>
        <th>    name  </th>
        <th>    apellidoS  </th>
        <th>    documento  </th>
        <th>    Correo  </th>
        <th>    direccion  </th>
        <th>    telefono  </th>
        <th>    saldo  </th>
        
    </thead>
    <tbody>
        @foreach($empleado as $empleado)
       <tr>
        <td>{{$empleado->id}}</td>
        <td>{{$empleado->name}}</td>
        <td>{{$empleado->apellidoS}}</td>
        <td>{{$empleado->documento}}</td>      
        <td>{{$empleado->email}}</td>
        <td>{{$empleado->direccion}}</td>
        <td>{{$empleado->telefono}}</td>
        <td>{{$empleado->sueldo}}</td>
        <td>
            
        <td><a href="{{ url('editEmpleado', [$empleado->id]) }}" class="btn btn-danger">Editar</a>
        <td><a href="{{ url('destroyEmpleado', [$empleado->id]) }}" class="btn btn-warning">Eliminar</a>
           
        </td>

       </tr>
    </tbody>
    @endforeach;
    
    
    </div>
</table>    