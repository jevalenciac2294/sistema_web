<script src="{{asset('js/plusis.js')}}"></script>


@extends('layouts.app')
@extends('layouts.modalv')
@extends('layouts.laramap')

@section('htmlheader_title')
@endsection

@section('main-content')


<script>
    var banderaPintar = true;
</script>
<section  id="contenido_principal">

<div class="text-info" Style="padding-top: 40px">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
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
        
         <h4>Crear ruta</h4>
            <ol class="breadcrumb">
                <li><a href="{{url('user')}}">Inicio</a></li>
                <li><a href="{{url('rutaindex')}}">Rutas</a></li>
                <li class="active">Crear Rutas</li>
            </ol> 
        <div class="table-responsive" >
            
		<div class="margin" id="botones_control">

              <a href="{{url('rutaindex')}}"  class="btn btn-xs btn-primary" >Listado Rutas</a> 

		</div>
            <div class="panel-body">
<form method="post" action="{{url('rutacreate')}}" id="formmapa" file="true">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for=""> Nombre ruta </label>
        <input type='text' class="form-control input-sm" name='name' id="name" required="" />     
    </div>
<p>Seleccione el punto de inicio y los puntos parciales de cada recorrido</p>
        <div id="map"></div>
    
 
    <div class="form-group">     
        
        <input type='hidden' class="form-control input-sm" name='lat' id="lat" required="" readonly="" />
    </div>
    <div class="form-group">
        
        <input type='hidden' class="form-control input-sm" name='lng' id="lng" required="" readonly="" />
    </div>
    
    
    <!--<button type="submit" class="btn btn-default"> Guardar </button>-->
    <div class="form-group"  align="right">
    <input type="submit" class="btn btn-primary" value="Guardar " onclick="guardarmapa()">
    </div>

</form>
    <a href="front.blade.php"></a>
    <!--<form method="get" action="{{url('getLocationCoords')}}" id="searchRutas">-->

        <!--<form> <select id="district"></select></form>
        <select id="locationSelect" name="location" style="width: 150px">-->
        <!--</select>-->
<ul id="rutasResult">
                </ul>
       @section('js')
<!--<div class="container text-center">
-->     
 
<!--<script>
    $(document).ready(function(){
        $('#locationSelect').select2({
            placeholder:"Select and Search",
            ajax:{
                url:"/api/searchCity",
                type:"POST",
                dataType:"json",
                delay:250,
                data:function(params){
                    return{
                    locationVal:params.term,
                };
                },
                processResults:function(data){
                    return{
                        results:$.map(data.items,function(val,i){
                            return {id:i, text:val};
                        })
                    };
                }
            }
        });
        $('#locationSelect').on('select2:select',function(e){
                var val=$('#locationSelect').val();
        $.post('http://localhost/api/getLocationCoords',{val:val},function(match){
            var myLatLng = new google.maps.LatLng(match[0],match[1]);
            createMap(myLatLng);
            searchGirls(match[0],match[1]);
        });
        });
    });
</script>-->

</div>
</div>    

 </div>
    @stop

</div></section>

@endsection