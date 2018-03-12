@extends('layouts.home')
@section('title', 'Título del sitio web')
@section('description', 'Descripción del sitio web')
@section('keywords', 'palabras, clave, del, sitio, web')

@section('content')
<h1>Tutorial Laravel 5</h1>
{{$msg}}

@foreach ($array as $index => $val)
    <p>{{$index}} = {{$val}}</p>
@endforeach
@stop