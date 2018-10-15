<script src="{{asset('js/empleadovehiculoscript.js')}}"></script>
@extends('layouts.home')
@extends('layouts.modalv')

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
        <th>    title  </th>
        <th>    fecha_inicio  </th>
        <th>    fecha_final  </th>
        
    </thead>
    <tbody>
        @foreach($verAgenda as $verAgendaa)
       <tr>
        <td>{{$verAgendaa->id}}</td>
        <td>{{$verAgendaa->title}}</td>
        <td>{{$verAgendaa->fecha_inicio}}</td>
        <td>{{$verAgendaa->fecha_final}}</td>
        <td>

        </td>

       </tr>
    </tbody>
    @endforeach
    
    
    </div>
</table>