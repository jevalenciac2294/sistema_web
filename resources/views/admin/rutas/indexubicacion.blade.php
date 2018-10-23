<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.laramap')
@section('content')
@section('main-content')


<script>
    var banderaPintar = false;
    var myvar = '{{$parametro_test[1]}}';
    var text = myvar.replace(/&quot;/g, '\"');
//    console.log(text);
    var ubicacionesDeRuta = JSON.parse(text);
    
    
</script>



<section  id="contenido_principal">
 
<div class="box box-primary box-gris">
     <div class="box-header">
        
         <h4>Ubicacion rutas</h4>
            <ol class="breadcrumb">
                <li><a href="{{url('rutaindex')}}">Rutas</a></li>
                <li class="active">Ver Rutas</li>
            </ol> 
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">

              <a href="{{url('rutaindex')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 

		</div>

<!--<table class="table table-striped" border='1'>
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
-->    

<div id="map"></div>
</div>    

 </div>
</div></section>

@endsection
