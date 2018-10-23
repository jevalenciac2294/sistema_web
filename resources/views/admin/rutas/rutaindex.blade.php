<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@extends('layouts.laramap')
@section('htmlheader_title')
	
@endsection


@section('main-content')


    <section  id="contenido_principal">
            <!--<div class="text-info">-->
<!--
    {!! csrf_field() !!}
    @if(Session::has('message'))
    <div class="text-danger"></div>
    <div class="alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
            
        </button>
        
    </div>
        {{Session::get('message')}}
    @endif
</div>-->

<div class="box box-primary box-gris">
     <div class="box-header">

         <h4>Rutas</h4>
            <ol class="breadcrumb">
                <li><a href="{{url('user')}}">Inicio</a></li>
                <li class="active">Ver Rutas</li>
            </ol> 
        <form class="navbar-form navbar-right" role="search" action="{{url('admin/ruta/searchredirect')}}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
 <div class="form-group">
  <input type="text" class="form-control" name='search' placeholder="Buscar ..." />
 </div>
 <button type="submit" class="btn btn-default">Buscar</button>
</form>
         
         
            
		<div class="margin" id="botones_control">
              @if('rutas.rutaindex')

              <a href="{{url('rutaindex')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 
              <a href="{{url('generarpdfrutas')}}"  class="btn btn-xs btn-primary" >Listado PDF Rutas</a> 
              @endif
		</div>

    <div class="panel-body">
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>
        <th>    Id  </th>
        <th>    Nombre de la ruta  </th>
                
    </thead>
    <tbody>
        @foreach($ruta as $rutas)
       <tr>
        <td>{{$rutas->id}}</td>
        <td>{{$rutas->name}}</td>
        <td>
        
        @if('rutas.indexubicacion')
          

        <td  width="10px"><a href="{{ url('/indexubicacion', [$rutas->id]) }}" class="btn btn-danger">Ver</a></td>
        @endif
        @if('rutas.destroyruta')

         <td  width="10px"><a href="{{ url('/destroyruta', [$rutas->id]) }}" class="btn btn-warning">Eliminar</a>            
        </td>
        @endif

       </tr>
    </tbody>
    @endforeach
    
    
    
</table>

            {!! $ruta->render()!!}
          </div>
          </div>
</div>    

 </div>
</section>

@endsection