<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')

@section('htmlheader_title')
	
@endsection


@section('main-content')


<section  id="contenido_principal">

<div class="box box-primary box-gris">
     <div class="box-header">
        <div class="table-responsive" >

            <div class="box box-primary box-gris">

     <div class="box-header">
        <h1>Bienvenid@ {{Auth::user()->name}} a su Panel de Control __Usuario</h1>	
@if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif
<h3>Opcion:</h3>
<ul>
    <li><a href="{{url('user/password')}}">Cambiar mi password</a></li>
</ul>
</div>
</div>

</div>
</div>    


<!--<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              
</label> 

</div>
-->
 </div>
</section>
@endsection