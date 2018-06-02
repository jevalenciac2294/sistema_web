<script src="{{asset('js/vehiculoscript.js')}}"></script>
@extends('layouts.home')
@section('content')


<div Style="padding-top: 40px">
</div>
<div class="text-info" Style="padding-top: 40px">
    {!! csrf_field() !!}
    @if(Session::has('message'))
    <div class="text-danger"></div>
    <div class="alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
        
    </div>
        {{Session::get('message')}}
    @endif
</div>
<table class="table table-striped">
    <thead>
        <th>    id       </th>
        <th>    matricula  </th>
        <th>    marca  </th>
        <th>    modelo  </th>
        <th>    color  </th>
               
    </thead>
    <tbody>
        @foreach($vehiculo as $vehiculo)
       <tr>
        <td> {{$vehiculo->id}}</td>
        <td>{{$vehiculo->matricula}}</td>
        <td>{{$vehiculo->marca}}</td>
        <td>{{$vehiculo->modelo}}</td>
        <td>{{$vehiculo->color}}</td>      
        <td>
            
        <td><a href="{{ url('editVehiculo', [$vehiculo->id]) }}" class="btn btn-danger">Editar</a>    
        <td><a class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="listarRuta('{{url('obtenerRutas')}}','{{url('asignarutasvehiculo')}}', '{{$vehiculo->id}}', '{{ url('/indexubicacion') }}')">Asignar ruta</a>
        <td><a href="{{ url('destroyVehiculo', [$vehiculo->id]) }}" class="btn btn-warning">Eliminar</a>
        </td>
       </tr>
    </tbody> 
    @endforeach;
    
    
</table>    