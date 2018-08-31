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
    @if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>

@endif

         <h4>Rutas</h4>
         
        <form class="navbar-form navbar-right" role="search" action="{{url('admin/ruta/searchredirect')}}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
 <div class="form-group">
  <input type="text" class="form-control" name='search' placeholder="Buscar ..." />
 </div>
 <button type="submit" class="btn btn-default">Buscar</button>
</form>
         
         
            
		<div class="margin" id="botones_control">

              <a href="{{url('rutaindex')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 

		</div>

     <div class="table-responsive" >
<table class="table table-hover table-striped" cellspacing="0" width="100%">
    <thead>
        <th>    Id  </th>
        <th>    name  </th>
                
    </thead>
    <tbody>
        @foreach($ruta as $rutas)
       <tr>
        <td>{{$rutas->id}}</td>
        <td>{{$rutas->name}}</td>
        <td>
  
        <td><a href="{{ url('/indexubicacion', [$rutas->id]) }}" class="btn btn-danger">Ver</a>
                    
        </td>

       </tr>
    </tbody>
    @endforeach
    
    
    </div>
</table>
</div>
            {!! $ruta->render()!!}
</div>    

 </div>
</div></section>
@endsection
