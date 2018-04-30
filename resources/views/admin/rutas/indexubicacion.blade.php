@extends('layouts.laramap')
@section('content')
<script>
    var banderaPintar = false;
    var myvar = '{{$parametro_test[1]}}';
    var text = myvar.replace(/&quot;/g, '\"');
//    console.log(text);
    var ubicacionesDeRuta = JSON.parse(text);
    
    
</script>

<div Style="padding-top: 40px">
</div>
<div class="text-info" Style="padding-top: 40px">
    {!! csrf_field() !!}
    @if(Session::has('message'))
    <div class="text-danger"></div>
    <div class="alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
            
        </button>
        
    </div>
        {{Session::get('message')}}
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