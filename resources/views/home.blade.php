<script src="{{asset('js/plusis.js')}}"></script>

<!-- Minified Bootstrap CSS <script src="{{asset('js/dropdown.js')}}"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Minified Bootstrap JS {!! Html::script('js/jquery-2.1.0.min.js') !!}-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">    
    <script src="http://demo.expertphp.in/js/jquery.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')
@section('htmlheader_title')
    
@endsection

@section('main-content')




<section  id="contenido_principal">

<h3>Calendario</h3>
<div class="container" style="width: 700px; height: 700px; ">
    <div id="calendar" ></div>
</div>
<br/>

<script type='text/javascript'>
   
    $(document).ready(function() {
            var evt=[];
    $.ajax({
        url: 'evento/get',
        type: 'GET',
        dataType: "JSON",
        async:false
    }).done(function(r){
        evt=r;
    });
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, basicWeek, basicDay, listDay'
        },
        events: evt,
        dayClick: function(date, jsEvent, view, resourceObj){
            
        $("#fecha_inicio").val(date.format());
        
        $("#mdlEvent").modal();
        

      
        }
  
    });

       
  $('#fecha_final').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD',
            showTodayButton: true
            }); 



});

function cargarvehiculo(select_empleado){
     var urlraiz=$("#url_raiz_proyecto").val();
     //var miurl=urlraiz+"/quitar_permiso/"+idrol+"/"+idper+""; 
     var miurl=urlraiz+"/obtenerVehiculos/"+select_empleado[select_empleado.selectedIndex].value;

    $.ajax({
        url: miurl

    }).done( function(resul) {
        var valores=JSON.parse(resul);

        var select_Vehiculo = document.getElementById("select_Vehiculo");

        var j = select_Vehiculo.options.length;
        for(var i=0;i<j; i++){
            select_Vehiculo.options[0].remove(); 
        }

        var option = document.createElement('option');
        option.text = 'Seleccionar';
        select_Vehiculo.add(option);
        valores.forEach(function(item, index){
            var option = document.createElement('option');
            option.value = item.id;
            option.text = item.matricula;
    
            select_Vehiculo.add(option);    

        });


    }).fail( function() {

        var select_Vehiculo = document.getElementById("select_Vehiculo");
        var j = select_Vehiculo.options.length;
        for(var i=0;i<j; i++){
            select_Vehiculo.options[0].remove();
        }

        var option = document.createElement('option');
        option.text = 'Seleccionar';
        select_Vehiculo.add(option);

 
    });


}
function cargarRutas(select_Vehiculo){
     var urlraiz=$("#url_raiz_proyecto").val();
     //var miurl=urlraiz+"/quitar_permiso/"+idrol+"/"+idper+""; 
     var miurl2=urlraiz+"/obtenerRutas/"+select_Vehiculo[select_Vehiculo.selectedIndex].value;//+"/"+select_Vehiculo[select_Vehiculo.selectedIndex].value; 
    
    $.ajax({
        url: miurl2

    }).done( function(resul) {
        var valores=JSON.parse(resul);

        var select_Ruta = document.getElementById("select_Ruta");
        var j = select_Ruta.options.length;
        for(var i=0;i<j; i++){
            select_Ruta.options[0].remove();
        }

        var option = document.createElement('option');
        option.text = 'Seleccionar';
        select_Ruta.add(option);
        valores.forEach(function(item, index){
            var option = document.createElement('option');
            option.text = item.name;
            option.value = item.id;
            select_Ruta.add(option);
        });

    }).fail( function() {

        var select_Ruta = document.getElementById("select_Ruta");
        var j = select_Ruta.options.length;
        for(var i=0;i<j; i++){
            select_Ruta.options[0].remove();
        }

        var option = document.createElement('option');
        option.text = 'Seleccionar';
        select_Ruta.add(option);
    });
}
 
     
</script>

  <!-- Modal -->
 <div class="modal" tabindex="-1" role="dialog" id="mdlEvent">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <a href="#close-modal" rel="modal:close" class="close-modal close">&times; </a>
          <h4 class="modal-title">Agendar</h4>
        </div>
      <div class="modal-body">
        <div class="row">
            <form id="formulario_evento" method="POST" action="{{url('eventoPost')}}">
                
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <div class="col-md-4">
                <label for="" id="titulo" name="titulo"> Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div> 
            <div class="col-md-4">
                <label for="" > Fecha Inicio</label>
                <input type="text" name="fecha_inicio" id="fecha_inicio" readonly class="form-control">
            </div> 
            <div class="col-md-4">
                <label for="" > Fecha Final</label>
                <input type="text" name="fecha_final" id="fecha_final" autocomplete="off" class="form-control">
            </div> 
            <div class="col-md-4">
                <label for="" > Hora inicio</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control">
            </div> 
            <div class="col-md-4">
                <label for="" > Hora Final</label>
                <input type="time" name="hora_final" id="hora_final" class="form-control">
            </div> 

          <div class="form-group col-md-4">
            <label for="">Selecciona conductor</label>
            <select class="form-control" name="empleados" id="empleados" onchange="cargarvehiculo(this)" required>
              <option value="" disable="true" selected="true">Seleccionar</option>
                @foreach ($empleados as $key => $value)
                  <option value="{{$value->id}}">{{ $value->name }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="">Selecciona vehiculo</label>
            <select class="form-control" name="select_Vehiculo" id="select_Vehiculo" onchange="cargarRutas(this)" required>
              <option value="" disable="true" selected="true">Seleccionar</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="">Selecciona ruta</label>
            <select class="form-control" name="select_Ruta" id="select_Ruta" required>
              <option value="" disable="true" selected="true">Seleccionar</option>
            </select>
          </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar ">
           </div>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

    


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

 <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="css/bootstrap-modal.css" rel="stylesheet" />

<!--</form><input type="button" onclick=' $("#mdlEvent").modal("show");' value="click aqui"/>-->


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->


<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css></script>

<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css></script>

<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css.map></script>

<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css></script>

<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css></script>

<script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js></script>

<!--datepicker-->
<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.css.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.css.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.min.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker-en-CA.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar-tn.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.az.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.bg.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.bn.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.br.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.bs.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ca.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.cs.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.cy.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.da.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.de.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.el.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-AU.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-CA.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-GB.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-IE.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-NZ.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-ZA.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.eo.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.et.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.eu.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.fa.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.fi.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.fo.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.fr-CH.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.fr.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.gl.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.he.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.hi.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.hr.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.hu.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.hy.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.is.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.is.min.js></script>
 
 <script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.it-CH.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.it.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ja.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ka.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.kh.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.kk.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.km.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ko.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.kr.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.lt.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.lv.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.me.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.mk.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.mn.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ms.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.nl-BE.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.nl.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.no.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.oc.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pl.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ro.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.rs-latin.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.rs.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ru.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.si.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sk.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sl.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sq.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sr-latin.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sr.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sv.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.sw.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ta.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.tg.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.th.min.js></script>

<scripthttps://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.tk.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.tr.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.uk.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.uz-cyrl.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.uz-latn.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.vi.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.zh-CN.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.zh-TW.min.js></script>



<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.css></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.css.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.js></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.js.map></script>

<script https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/moment.min.js></script>


<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="js/bootstrap-datetimepicker.min.js"></script>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
     <link href="assets/css/datepicker.css" rel="stylesheet" />

    <script src="assets/js/bootstrap-datepicker.js"></script>


      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../../daterangepicker.css" />


</section>
@endsection