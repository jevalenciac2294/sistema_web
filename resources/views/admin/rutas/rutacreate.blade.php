@extends('layouts.laramap')

@section('content')
<script>
    var banderaPintar = true;
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<form  method="post" action="{{url('home/front')}}" class="container">
    
    
</form>
<!--<a href="{{url('admin/createadmin')}}" class="btn btn-info"> Crear ruta</a>-->
{!! csrf_field() !!}
<form method="post" action="{{url('rutacreate')}}" id="formmapa" file="true">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for=""> Nombre ruta </label>
        <input type='text' class="form-control input-sm" name='name' id="name" required="" />     
    </div>

        <div id="map"></div>
    
 
    <div class="form-group">     
        
        <input type='hidden' class="form-control input-sm" name='lat' id="lat" required="" readonly="" />
    </div>
    <div class="form-group">
        
        <input type='hidden' class="form-control input-sm" name='lng' id="lng" required="" readonly="" />
    </div>
    
    
    <!--<button type="submit" class="btn btn-default"> Guardar </button>-->
    <button type="button" onclick="guardarmapa()" class="btn btn-default"> Guardar </button>

</form>
    <a href="front.blade.php"></a>
    <!--<form method="get" action="{{url('getLocationCoords')}}" id="searchRutas">-->

        <!--<form> <select id="district"></select></form>
        <select id="locationSelect" name="location" style="width: 150px">-->
        </select>
<ul id="rutasResult">
                </ul>
@section('content')
<div class="container text-center">
    <h2>
        Laramap
    </h2>
                    
        @section('js')
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
@endsection