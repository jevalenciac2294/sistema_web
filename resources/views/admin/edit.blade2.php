@extends('layouts.home')

@section('content')
<div class="text-info" Style="padding-top: 40px">
</div>

<form method="POST" action="{{url('admin/update', [$users->id])}}">
    {!! csrf_field() !!}

    <div class='form-group'>
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ $users->name }}" />
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ $users->email }}" />
        <div class="text-danger">{{$errors->first('email')}}</div>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" />
        <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
    
    <div class="form-group">
        <label for="user">Tipo de usuario:</label>
        <input type="text" class="form-control" name="user">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@stop