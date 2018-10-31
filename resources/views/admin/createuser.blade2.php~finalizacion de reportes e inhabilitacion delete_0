<script src="{{asset('js/plusis.js')}}"></script>
@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')


<section  id="contenido_principal">
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Crear usuario admin</h4>
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<div class="panel-body">

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
@stop
</div></section>