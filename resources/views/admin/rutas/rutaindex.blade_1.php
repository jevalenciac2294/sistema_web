@extends('layouts.laramap')
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
                
    </thead>
    <tbody>
        @foreach($ruta as $ruta)
       <tr>
        <td>{{$ruta->id}}</td>
        <td>{{$ruta->name}}</td>
        <td>
  
        <td><a href="{{ url('/indexubicacion', [$ruta->id]) }}" class="btn btn-danger">Ver</a>
                    
        </td>

       </tr>
    </tbody>
    @endforeach
    
    
    </div>
</table>    