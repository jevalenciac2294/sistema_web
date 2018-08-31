<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.laramap')
@section('content')
@section('main-content')

@if(count($permisos)==0)
<p>usuario no tiene ningun permiso</p>
@else

<script>
    var banderaPintar = false;
    var myvar = '{{$parametro_test[1]}}';
    var text = myvar.replace(/&quot;/g, '\"');
//    console.log(text);
    var ubicacionesDeRuta = JSON.parse(text);
    
    
</script>

@if(!empty($permisos['index_ubicacion_ruta']))

<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
        
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">
@if(!empty($permisos['listado_ruta']))
              <a href="{{url('indexubicacion')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 
@endif
		</div>
<table class="table table-striped" border='1'>
    <thead>
        <th>    Id  </th>
        <th>    lat  </th>
        <th>    lng  </th>
                
    </thead>
    <tbody>
    @foreach ($parametro_test[0] as $u)
    <tr>
    <td>Ubicacion {{$u->id}}</td>
    <td>Lat {{$u->lat}}</td>
    <td>Lng {{$u->lng}}</td>
    </tr>
    @endforeach
    </tbody>
    
    
    </div>
</table>    
este es el json {{$parametro_test[1]}}


<div id="map"></div>
</div>    

 </div>
</div></section>
@else
<p>El usuario no tiene permisos</p>
@endif
@endsection
@endif