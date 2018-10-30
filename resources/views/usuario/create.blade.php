<script src="{{asset('js/plusis.js')}}"></script>
@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
	
@endsection

@section('main-content')

<section  id="contenido_principal">    

<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
<div class="box box-primary box-gris">
     <div class="box-header">
<<<<<<< HEAD
        <h4 class="box-title">Crear Usuario</h4>

            <ol class="breadcrumb">
                <li><a href="user">Inicio</a></li>
                <li class="active">Crear usuario</li>
            </ol> 

=======
        <h4 class="box-title">Crear Usuarios</h4>
>>>>>>> origin/master
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
		</div>
<div class="panel-body">
        
<div class="myform-bottom">
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
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
<<<<<<< HEAD
        <button type="submit" class="btn btn-primary">Registrar</button>
=======
        <button type="submit" class="btn btn-primary">Registrarme</button>
>>>>>>> origin/master
    </div>
 </div>
{!!Form::close()!!}
</div>
</div>
</div>
</div></section>
@endsection