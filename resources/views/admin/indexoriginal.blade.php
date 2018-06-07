<script src="{{ asset('/js/plusis.js') }}" type="text/javascript"></script>
@extends('layouts.home')

@section('content')

<div Style="padding-top: 40px">
</div>
<div class="text-info" Style="padding-top: 40px">
    
    @if(Session::has('message'))
    <div class="text-danger"></div>
    <div class="alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
            
        </button>
        
    </div>
        {{Session::get('message')}}
    @endif
    
</div>
<a href="{{url('admin/createadmin')}}" class="btn btn-info"> Crear usuario</a>
{!! csrf_field() !!}
<form method="get" action="{{url('admin/index')}}">
    <div class="input-group">
        <input type='text' value="{{Input::get('name')}}" name='name' class='form-control' placeholder="Buscar usuario"/>
    <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
    </div>

    <button type="submit" class="btn btn-default">Buscar</button>
</form>




<table class="table table-striped">
    <thead>
        <th>    Id  </th>
        <th>    Nombre  </th>
        <th>    Correo  </th>
        
        <th>    Tipo Usuario  </th>
        
        
    </thead>
    <tbody>
        @foreach($users as $user)
       <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->user}}</td>
        <td>
        
    <label for="nombre" ></label><span style="margin-left:15px;"><?= $user->tipo($user->user);   ?></span> </span></li>
        
        <td><a href="{{ url('admin/edit', [$user->id]) }}" class="btn btn-danger">Editar</a>
        <td><a href="{{ url('admin/destroy', [$user->id]) }}" class="btn btn-warning">Eliminar</a>
           
        </td>

       </tr>
    </tbody>
    @endforeach
    
    
    </div>
</table>    
