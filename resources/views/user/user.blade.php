@extends('layouts.home')
@section('content')
<div style="padding-top: 40px ">
<h1>Bienvenid@ {{Auth::user()->name}} a su Panel ddddde Control</h1>
</div>
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