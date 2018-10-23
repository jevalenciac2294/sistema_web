@extends('layouts.auth')

@section('content')

<h1>Formulario de registro</h1>

<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
<div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >

                   <a class="mybtn-social pull-right" href='{{url("auth/login")}}'>Iniciar Sesion</a>

                   <a class="mybtn-social pull-right" href="{{url('auth/register')}}">Registrarme</a>

<!--                  <a class="mybtn-social pull-right" href="{{ url('auth/login') }}">
                       Login
                  </a>-->
                   <a class="mybtn-social pull-right" href='{{url("password/email")}}'>Olvidé mi contraseña</a>
 <div>                 
<div class="col-sm-6 col-sm-offset-3 myform-cont" >
<div class="myform-bottom">
<form method="POST" action="{{url('auth/register')}}">
    {{ csrf_field() }}

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
        <button type="submit" class="btn btn-primary">Registrarme</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@stop