<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
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
        
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">

              <a href="{{url('rutaindex')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 

		</div>

<table class="table table-striped">
    <thead>
        <th>    Id  </th>
        <th>    name  </th>
                
    </thead>
    <tbody>
        @foreach($ruta as $ruta)
       <tr>
        <td>{{$ruta->id}}</td>
        <td>{{$ruta->name}}</td>
        <td>
  
        <td><a href="{{ url('/indexubicacion', [$ruta->id]) }}" class="btn btn-danger">Ver</a>
                    
        </td>

       </tr>
    </tbody>
    @endforeach
    
    
    </div>
</table>    
</div>    

 </div>
</div></section>
@endsection
