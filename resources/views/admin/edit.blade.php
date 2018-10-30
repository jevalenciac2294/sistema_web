<script src="{{asset('js/plusis.js')}}"></script>


@extends('layouts.app')

@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')


<section  id="contenido_principal">
<div class="box box-primary box-gris">
     <div class="box-header">
        <h4 class="box-title">Editar Usuarios</h4>
<<<<<<< HEAD

            <ol class="breadcrumb">
                <li><a href="user">Inicio</a></li>
                <li><a href="{{url('admin/index')}}">Usuarios</a></li>
                <li class="active">Editar usuarios</li>
            </ol> 

=======
>>>>>>> origin/master
        <div class="table-responsive" >
            
        <div class="margin" id="botones_control">
        </div>
<form method="POST" action="{{url('update', [$users->id])}}">
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

<h3>Lista de roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
        <li>
            <label>
        
            {!! Form::checkbox('roles[]', $role->id, null) !!}
            {{ $role->name }}
            <em>({{ $role->description }})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
    <div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
        
@stop
</div></section>
