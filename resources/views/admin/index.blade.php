@extends('layouts.home')

@section('content')
<div Style="padding-top: 40px">
</div>
<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
<table>
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Descripcion</th>
    </thead>
    <tbody>
        @foreach($users as $user)
       <tr>
        
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            
        <td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></td>
       </tr>
    </tbody>
    @endforeach;
    <div class="pagination-bar text-center">
    
    </div>
</table>    