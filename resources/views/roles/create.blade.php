<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')


<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
<<<<<<< HEAD
        <h4 class="box-title">Crear Roles</h4> 


            <ol class="breadcrumb">
                <li><a href="user">Inicio</a></li>
                <li><a href="{{url('admin/index')}}">Usuarios</a></li>
                <li><a href="{{url('roles')}}">Roles</a></li>
                <li class="active">Crear Roles</li>
            </ol>  
=======
        <h4 class="box-title">Roles</h4>  
>>>>>>> origin/master

                <div class="panel-body">                    
                    {!! Form::open(['route' => 'roles.store']) !!}

                        @include('roles.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection