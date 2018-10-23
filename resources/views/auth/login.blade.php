<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Web | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
@extends('layouts.auth')

@section('content')
 <h1>Iniciar sesión</h1>
<div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{url('auth/register')}}">Registrarme</a>

<!--                  <a class="mybtn-social pull-right" href="{{ url('auth/login') }}">
                       Login
                  </a>-->
                   <a class="mybtn-social pull-right" href='{{url("password/email")}}'>Olvidé mi contraseña</a>
            
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
<!--                         <img  src="{{ url('img/logo_plusis.png') }} " class="img-responsive logo" />
                          <h3>Ingresa a nuestro sitio.</h3>-->
                            <p>Digita su email y contraseña:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-key"></i>
                        </div>
                    </div>
                  
                  @if (count($errors) > 0)
                 <div class="col-sm-12" >
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Error de Accesso 
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                @endif
<div class="myform-bottom">        
                
 <form method="post" action="{{url('auth/login')}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
   <label for="email">Email:</label>
   <input type="email" name="email" class="form-control" value="{{Input::old('email')}}" />
   <div class="text-danger">{{$errors->first('email')}}</div>
  </div>
  <div class="form-group">
   <label for="password">Password:</label>
   <input type="password" name="password" class="form-control" />
   <div class="text-danger">{{$errors->first('password')}}</div>
  </div>
<!--  <div class="form-group">
   <label for="remember">No cerrar sesión:</label>
   <input type="checkbox" name="remember" />
  </div>-->
  <button type="submit" class="btn btn-primary">Iniciar sesión</button>
 </form>
 
 </div>
              </div>
            </div></div>
              </div>
            


@stop

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>