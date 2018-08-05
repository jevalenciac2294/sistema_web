@extends('layouts.home')
@section('content')


<h1 class="container" Style="padding-top: 80px">Crear un nuevo usuario</h1>
<hr />

<div class="text-info" Style="padding-top: 30px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>

<form class="container" method="POST" action="{{url('admin/createuser')}}">
    {!! csrf_field() !!}

    <div class='form-group'>
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
        <div class="text-danger">{{$errors->first('email')}}</div>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" />
        <div class="text-danger">{{$errors->first('password')}}</div>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmar Password:</label>
        <input type="password" class="form-control" name="password_confirmation" />
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
    </div>
</form>