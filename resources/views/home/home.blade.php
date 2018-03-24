@extends('layouts.home')


@section('content')
<div style="padding-top: 40px "><h1>Bienvenid@s a la aplicación PAgina Principal</h1>
</div>

@if (Session::has('status'))
<div class='text-success'>
    {{Session::get('status')}}
</div>
@endif

@stop