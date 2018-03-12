@extends('layouts.home')

@section('content')
<h1>Bienvenid@s a la aplicación</h1>

@if (Session::has('status'))
<div class='text-success'>
    {{Session::get('status')}}
</div>
@endif

@stop