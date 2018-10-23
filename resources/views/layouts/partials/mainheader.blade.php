<!-- Main Header -->
<!--<header class="main-header" style="position: fixed; top: 0; width: 100%; height: 100%; overflow: hidden; ">-->
<header class="main-header">
    
    
    
    <!-- Logo -->
    <a href="{{ url('admin/index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b> SISWES </b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SISWES </b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
               <!-- /.messages-menu -->

                <!-- Notifications Menu
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- Inner Menu: contains the notifications 
                            <ul class="menu">
                                <li><!-- start notification 
                                    <a href="#">
                                    </a>
                                </li><!-- end notification
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- Tasks Menu -->
                
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}"></a></li>
                    <li><a href="{{ url('/login') }}"></a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                          
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                             
                                <p>
                                    {{ Auth::user()->name }}
                                 <!--   <small>{{ trans('adminlte_lang::message.login') }} Feb. 2017</small> -->
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <!-- Menu Body <a href="#">{{ trans('adminlte_lang::message.followers') }}  Menu body 1111</a> -->
                                </div>
                                <div class="col-xs-4 text-center">
                                    <!-- <a href="#">{{ trans('adminlte_lang::message.sales') }}  Menu body 2222</a> -->
                                </div>
                                <div class="col-xs-4 text-center">
                                  <!--   <a href="#">{{ trans('adminlte_lang::message.friends') }}  Menu body 3333</a> -->
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('auth/logout')}}" class="btn btn-default btn-flat">Salir</a>
                                    <a href="{{url('user/password')}}" class="btn btn-default btn-flat">Cambiar mi password</a>
                                </div>
                                <div class="pull-right">

                                    
<!--                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="btn btn-default btn-flat"  >
                                        </a>
<li><a href="{{url('auth/logout')}}">Logout</a></li>-->
<form id="logout-form" class='active' method="post"  action="{{url('auth/logout')}}">
                                            {{ csrf_field() }} 
                                        </form>
                                

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                
            </ul>
        </div>
    </nav>
</header>
