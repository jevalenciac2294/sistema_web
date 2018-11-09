@extends('layouts.auth')
@section('content')

<h1>Cambiar mi password</h1>
@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif



<hr />
        
<div class="col-sm-6 col-sm-offset-3 myform-cont" >

 <h4 class="box-title">Perfil</h4>
            <ol class="breadcrumb">
                <a href="{{url('user')}}" class="btn btn-default btn-flat">Atrás</a>
            </ol> 	
<div class="myform-bottom">
<form method="post" action="{{url('user/updatepassword')}}">
 {{csrf_field()}}
 <div class="form-group">
  <label for="mypassword">Introduce tu actual password:</label>
  <input type="password" name="mypassword" class="form-control">
  <div class="text-danger">{{$errors->first('mypassword')}}</div>
 </div>
 <div class="form-group">
  <label for="password">Introduce tu nuevo password:</label>
  <input type="password" name="password" class="form-control">
  <div class="text-danger">{{$errors->first('password')}}</div>
 </div>
 <div class="form-group">
  <label for="mypassword">Confirma tu nuevo password:</label>
  <input type="password" name="password_confirmation" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary">Cambiar mi password</button>
</form>
</div>
</div>
@stop