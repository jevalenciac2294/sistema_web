@extends('layouts.home')
@section('content')
<h1>Bienvenid@ {{Auth::user()->name}} a su Panel de Control</h1>
@if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif
<h3>Opcion:</h3>
<ul>
    <li><a href="{{url('user/password')}}">Cambiar mi password</a></li>
</ul>
@stop