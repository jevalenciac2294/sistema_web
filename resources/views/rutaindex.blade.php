@extends('rutas.laramap')
@extends('layouts.home')

@section('content')

<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<form  method="post" action="{{url('home/front')}}" class="container">
    
    
</form>
<!--<a href="{{url('admin/createadmin')}}" class="btn btn-info"> Crear ruta</a>-->
<div>
    
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