<script src="{{asset('js/plusis.js')}}"></script>

@extends('layouts.app')
@extends('layouts.modalv')

@section('htmlheader_title')
	
@endsection


@section('main-content')


<h1>Bienvenid@ {{$data['name']}}</h1>
<a href="{{url()}}/auth/confirm/email/{{$data['email']}}/confirm_token/{{$data['confirm_token']}}">Confirmar mi cuenta</a>