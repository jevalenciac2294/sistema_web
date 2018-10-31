<?php
use App\Empleado;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Sim
 * 
 * ply tell Laravel the URIs it should respond to
 */
//Route::get('/', function(){
//return redirect('auth/login');
//});

//Auth::routes();
//
//Route::group(['middleware' => 'auth'], function () {

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//Route::get('auth/logout', 'AuthController@logout');
Route::get('auth/logout', function(){
   Auth::logout();
   return Redirect::to('auth/login');
});
Route::get('home', 'HomeController@home');


Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

//confirmar email
Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');
        



Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('register', 'AdminController@getRegister')->name('users.createuser')
        ->middleware('permissionshinobi:users.createuser');
Route::post('register', 'AdminController@getRegister')->name('users.createuser')
        ->middleware('permissionshinobi:users.createuser');

Route::get('user', 'UserController@user');
Route::get('admin/user', 'UserController@adminuser');

Route::resource('usuario','UserController', ['names' => [
   'create' => 'users.createuser'
]]);
//Route::resource('usuario','UserController')->name('users.createuser')
  // ->middleware('permissionshinobi:users.createuser');
/*Route::group(['prefix' => 'api'], function () {
    Route::resource('usuario','UserController', ['name' => [
        'usuario.create' => 'users.createuser',
    ]]);
});*/
 //   Route::any('usuario/store', 'UserController@store');

   // Route::get('usuario/create', 'UserController@create');


Route::resource('usuario','UserController', ['names' => [
   'create' => 'users.createuser'
]]);
//Route::resource('usuario','UserController')->name('users.createuser')
  // ->middleware('permissionshinobi:users.createuser');
/*Route::group(['prefix' => 'api'], function () {
    Route::resource('usuario','UserController', ['name' => [
        'usuario.create' => 'users.createuser',
    ]]);
});*/
 //   Route::any('usuario/store', 'UserController@store');

   // Route::get('usuario/create', 'UserController@create');


Route::get('user/password', 'UserController@password');
Route::post('user/updatepassword', 'UserController@updatePassword');
//Crear usuario
Route::get('admin/createadmin', 'AdminController@create')->name('users.createuser')
        ->middleware('permissionshinobi:users.createuser');


//Route::post('user/store', 'UserController@store');
Route::match(['get', 'post'], 'admin/create', 'AdminController@create')->name('users.createuser')
        ->middleware('permissionshinobi:users.createuser');
//Route::get('createuser', 'AdminController@createuser');

//crear usuario desde el admin

//crear useruario desde admin
Route::match(['get', 'post'], 'admin/createuser', 'AdminController@createuser');
Route::get('admin/createuser', 'AdminController@createuser');
Route::get('adminuser', 'AdminController@adminuser');

//Ver usuario
Route::get('admin/index', 'AdminController@index')->name('users.index')
        ->middleware('permissionshinobi:users.index');
Route::post('admin/index', 'AdminController@index')->name('users.index')
        ->middleware('permissionshinobi:users.index');
//destroy usuario
//Route::get('admin/edit', 'AdminController@edit');

Route::post('update/{id}', 'AdminController@update')->name('users.edit')
        ->middleware('permissionshinobi:users.edit');


Route::get('edit/{id}', 'AdminController@edit')->name('users.edit')
        ->middleware('permissionshinobi:users.edit');


Route::get('edit/{id}', 'AdminController@edit')->name('users.edit')
        ->middleware('permissionshinobi:users.edit');

Route::post('admin/destroy/{id}', 'AdminController@destroy')->name('users.destroy')
        ->middleware('permissionshinobi:users.destroy');
Route::get('admin/destroy/{id}', 'AdminController@destroy')->name('users.destroy')
        ->middleware('permissionshinobi:users.destroy');

Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin')->name('users.createuser')
        ->middleware('permissionshinobi:users.createuser');

Route::get('admin', 'AdminController@admin');

//Empleado
//Mostrar empleados empleado.indexEmpleado
Route::get('indexEmpleado', 'EmpleadoController@indexEmpleado')->name('empleado.indexEmpleado')
        ->middleware('permissionshinobi:empleado.indexEmpleado');
Route::post('indexEmpleado', 'EmpleadoController@indexEmpleado')->name('empleado.indexEmpleado')
        ->middleware('permissionshinobi:empleado.indexEmpleado');

//Route::get('admin/edit/{id}', 'AdminController@edit');
//agregar empleado empleado.createEmpleado

Route::get('createEmpleado', 'EmpleadoController@createEmpleado')->name('empleado.createEmpleado')
        ->middleware('permissionshinobi:empleado.createEmpleado');
Route::post('createEmpleado', 'EmpleadoController@createEmpleado')->name('empleado.createEmpleado')
        ->middleware('permissionshinobi:empleado.createEmpleado');
//Editar empelado existente
////Eliminar empleado existente
//Route::delete('/empleado/{id}', function($id){}); empleado.editEmpleado


Route::post('updateEmpleado/{id}', 'EmpleadoController@updateEmpleado')->name('empleado.editEmpleado')
        ->middleware('permissionshinobi:empleado.editEmpleado');
Route::get('editEmpleado/{id}', 'EmpleadoController@editEmpleado')->name('empleado.editEmpleado')
        ->middleware('permissionshinobi:empleado.editEmpleado');

Route::post('destroyEmpleado/{id}', 'EmpleadoController@destroyEmpleado')->name('empleado.destroyEmpleado')
        ->middleware('permissionshinobi:empleado.destroyEmpleado');
Route::get('destroyEmpleado/{id}', 'EmpleadoController@destroyEmpleado')->name('empleado.destroyEmpleado')
        ->middleware('permissionshinobi:empleado.destroyEmpleado');
//Buscar en el index, usuarios creados
//Route::get('admin/searchredirect', function(){
//     
//    /* Nuevo: si el argumento search está vacío regresar a la página anterior */
//    if (empty(Input::get('search'))) return redirect()->back();
//    
//    $search = urlencode(e(Input::get('search')));
//    $route = "admin/search/$search";
//    return redirect($route);
//});
//Route::get("admin/search/{search}", "adminController@search");

//Route::get('/posts', 'PostsController@index')->name('posts.index');

//Vehiculos
//create vehiculo
//agregar empleado

Route::get('createVehiculo', 'VehiculoController@createVehiculo')->name('vehiculo.createVehiculo')
        ->middleware('permissionshinobi:vehiculo.createVehiculo');
//Buscar en el index, usuarios creados
Route::post('createVehiculo', 'VehiculoController@createVehiculo')->name('vehiculo.createVehiculo')
        ->middleware('permissionshinobi:vehiculo.createVehiculo');
//Buscar en el index, usuarios creados

//Mostrar vehiculos asignados a los empleados
Route::get('indexVehiculo/{id}', 'VehiculoController@indexVehiculo')->name('vehiculo.indexVehiculo')
        ->middleware('permissionshinobi:vehiculo.indexVehiculo');


Route::get('indexVehiculo', 'VehiculoController@indexVehiculos')->name('vehiculo.indexVehiculo')
        ->middleware('permissionshinobi:vehiculo.indexVehiculo');

//Buscar en el index, usuarios creados
Route::post('indexVehiculo/{id}', 'VehiculoController@indexVehiculo')->name('vehiculo.indexVehiculo')
        ->middleware('permissionshinobi:vehiculo.indexVehiculo');

//Mostrar vehiculos --------------------
Route::get('indexVehiculos', 'VehiculoController@indexVehiculos')->name('vehiculo.indexVehiculo')
        ->middleware('permissionshinobi:vehiculo.indexVehiculo');
//Buscar en el index, usuarios creados
Route::post('indexVehiculos', 'VehiculoController@indexVehiculos')->name('vehiculo.indexVehiculo')
        ->middleware('permissionshinobi:vehiculo.indexVehiculo');
//Buscar en el index, usuarios creados

//Route::get('admin/edit/{id}', 'AdminController@edit');

//Editar vehiculo existente
////Eliminar vehiculo existente
//Route::delete('/vehiculo/{id}', function($id){});


Route::post('updateVehiculo/{id}', 'VehiculoController@updateVehiculo')->name('vehiculo.editvehiculo')
        ->middleware('permissionshinobi:vehiculo.editvehiculo');
//Buscar en el index, usuarios creados
Route::get('editVehiculo/{id}', 'VehiculoController@editVehiculo')->name('vehiculo.editvehiculo')
        ->middleware('permissionshinobi:vehiculo.editvehiculo');
//Buscar en el index, usuarios creados

Route::post('destroyVehiculo/{id}', 'VehiculoController@destroyVehiculo')->name('vehiculo.destroyVehiculo')
        ->middleware('permissionshinobi:vehiculo.destroyVehiculo');
//Buscar en el index, usuarios creados
Route::get('destroyVehiculo/{id}', 'VehiculoController@destroyVehiculo')->name('vehiculo.destroyVehiculo')
        ->middleware('permissionshinobi:vehiculo.destroyVehiculo');
//Buscar en el index, usuarios creados


//Route::any("home/front", "HomeController@front");
//Route::post('/Rutas', 'RutasController@searchRutas');

Route::get('rutacreate', 'RutasController@rutacreate')->name('rutas.rutacreate')
        ->middleware('permissionshinobi:rutas.rutacreate');
Route::post('rutacreate', 'RutasController@rutacreate')->name('rutas.rutacreate')
        ->middleware('permissionshinobi:rutas.rutacreate');

Route::get('rutaindex', 'RutasController@rutaindex')->name('rutas.rutaindex')
        ->middleware('permissionshinobi:rutas.rutaindex');
Route::post('rutaindex', 'RutasController@rutaindex')->name('rutas.rutaindex')
        ->middleware('permissionshinobi:rutas.rutaindex');

//Route::get('home/front', function(){
//    return View::make('home.front');
//});
//
//Route::post('rutacreate', function(){
//
//    Ruta::create(Input::all());
//    var_dump('esta agregado...');
//});
//
//Route::get('rutaindex/id', function($id){
//
//     
//    $ruta= Ruta::find($id);
//    
//    return View::make('ruta', compact('ruta'));
//    
//});

//Mostrar rutas
//Route::get('prueba/indexruteo', 'HomeController@rutaindex');
//Route::post('prueba/indexruteo', 'HomeController@rutaindex

Route::get('destroyruta/{id}', 'RutasController@destroyruta')->name('rutas.destroyruta')
        ->middleware('permissionshinobi:rutas.destroyruta');
Route::post('destroyruta/{id}', 'RutasController@destroyruta')->name('rutas.destroyruta')
        ->middleware('permissionshinobi:rutas.destroyruta');


Route::get('indexubicacion/{ruta_id}', 'RutasController@indexubicacion')->name('rutas.indexubicacion')
        ->middleware('permissionshinobi:rutas.indexubicacion');
Route::post('indexubicacion/{ruta_id}', 'RutasController@indexubicacion')->name('rutas.indexubicacion')
        ->middleware('permissionshinobi:rutas.indexubicacion');
Route::get('indexubicacion/{ruta_id}', 'RutasController@indexubicacion')->name('rutas.destroyruta')
        ->middleware('permissionshinobi:rutas.indexubicacion');
Route::post('indexubicacion/{ruta_id}', 'RutasController@indexubicacion')->name('rutas.destroyruta')
        ->middleware('permissionshinobi:rutas.indexubicacion');

//Route::get('rutaindex', 'RutasVehiculoController@rutavehiculo');
//Route::post('rutaindex', 'RutasVehiculoController@rutavehiculo');
Route::get('obtenerRutas', 'RutasController@obtenerRutas');
//rutasvehiculos.asignarutasvehiculo
Route::post('asignarutasvehiculo', 'RutasVehiculoController@asignarutasvehiculo')->name('rutasvehiculos.asignarutasvehiculo')
        ->middleware('permissionshinobi:rutasvehiculos.asignarutasvehiculo');
Route::get('asignarutasvehiculo', 'RutasVehiculoController@asignarutasvehiculo')->name('rutasvehiculos.asignarutasvehiculo')
        ->middleware('permissionshinobi:rutasvehiculos.asignarutasvehiculo');

//Route::post('removerutasvehiculo/{id}', 'RutasVehiculoController@removerutasvehiculo');
//Route::get('removerutasvehiculo/{id}', 'RutasVehiculoController@removerutasvehiculo');
//
//Route::post('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');
//Route::get('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');

//-----------------Empleado Vehiculo---------------------------------
Route::get('obtenerVehiculo', 'VehiculoController@obtenerVehiculo');
//empleadoVehiculo.asignaempleadovehiculo
Route::post('asignaempleadovehiculo', 'EmpleadoVehiculoController@asignaempleadovehiculo')->name('empleadoVehiculo.asignaempleadovehiculo')
        ->middleware('permissionshinobi:empleadoVehiculo.asignaempleadovehiculo');
Route::get('asignaempleadovehiculo', 'EmpleadoVehiculoController@asignaempleadovehiculo')->name('empleadoVehiculo.asignaempleadovehiculo')
        ->middleware('permissionshinobi:empleadoVehiculo.asignaempleadovehiculoo');

//Route::post('removempleadosvehiculo/{id}', 'EmpleadoVehiculoController@removempleadovehiculo');
//Route::get('removempleadovehiculo/{id}', 'EmpleadoVehiculoController@removempleadovehiculo');
//
//Route::post('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');
//Route::get('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');

//permisos-----------------------------------------

//Route::post('permissions/store', 'PermissionController@store')->name('permissions.store');
//Route::post('permissions/getAllParents', 'PermissionController@getAllParents')->name('permissions.store');
//Route::post('permissions/refreshWith', 'PermissionController@refreshWith')->name('permissions.store');



//});

//	Route::get('/home', 'HomeController@index');
    

    Route::post('buscar_usuario', 'AdminController@buscar_usuario');
    
    Route::post('editar_acceso', 'AdminController@editar_acceso');
  

    Route::post('crear_rol', 'AdminController@crear_rol');
    Route::post('crear_permiso', 'AdminController@crear_permiso');
    Route::post('asignar_permiso', 'AdminController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'AdminController@quitar_permiso');
    
    
    Route::get('form_nuevo_usuario', 'AdminController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'AdminController@form_nuevo_rol');//->middleware('rolesshinobi:administrador');
    Route::get('form_nuevo_permiso', 'AdminController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'AdminController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'AdminController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'AdminController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'AdminController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'AdminController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'AdminController@borrar_rol');


    //--------------------Buscador Usuarios----------------------------------------------
 
    Route::get('admin/searchredirect', function(){


        /* Nuevo: si el argumento search está vacío regresar a la página anterior */
        if (empty(Input::get('search'))) return redirect()->back();

        $search = urlencode(e(Input::get('search')));
        $route = "admin/index/$search";
        return redirect($route);
    });
    Route::get("admin/index/{search}", "AdminController@search");

//--------------------Buscador Empleados----------------------------------------------
 
    Route::get('admin/empleado/searchredirect', function(){


        /* Nuevo: si el argumento search está vacío regresar a la página anterior */
        if (empty(Input::get('search'))) return redirect()->back();

        $search = urlencode(e(Input::get('search')));
        $route = "admin.empleado.indexEmpleado/$search";
        return redirect($route);
    });
    Route::get("admin.empleado.indexEmpleado/{search}", "EmpleadoController@search");
    
    
    //--------------------Buscador rutas----------------------------------------------

        Route::get('admin/ruta/searchredirect', function(){


        /* Nuevo: si el argumento search está vacío regresar a la página anterior */
        if (empty(Input::get('search'))) return redirect()->back();

        $search = urlencode(e(Input::get('search')));
        $route = "admin.ruta.rutaindex/$search";
        return redirect($route);
    });
    Route::get("admin.ruta.rutaindex/{search}", "RutasController@search");  
    //--------------------Buscador vehiculos----------------------------------------------

        Route::get('admin/vehiculo/searchredirect', function(){


        /* Nuevo: si el argumento search está vacío regresar a la página anterior */
        if (empty(Input::get('search'))) return redirect()->back();

        $search = urlencode(e(Input::get('search')));
        $route = "admin.vehiculo.indexVehiculo/$search";
        return redirect($route);
    });
    Route::get("admin.vehiculo.indexVehiculo/{search}", "VehiculoController@search");
    
    //-----------------------------Calledar
    Route::get('/evento/get', 'HomeController@get_events');
    Route::post('home', 'HomeController@create_events');
    Route::get('home', 'HomeController@create_events')->name('users.agendar')
        ->middleware('permissionshinobi:users.agendar'); 
Route::post('home/fetch', 'HomeController@fetch')->name('dynamicdependent.fetch');
Route::post('select',['uses'=>'HomeController@postSelect','as'=>'postSelect']);

//Route::get('createEmpleado', 'EmpleadoController@createEmpleado');users.agendar
Route::post('eventoPost', 'HomeController@create_events2')->name('home.agendar')
        ->middleware('permissionshinobi:home.agendar');

    //Route::post('prueba', 'HomeController@create_events2');
    //Route::get('prueba', 'HomeController@create_events2');   

    Route::post('prueba', 'HomeController@prueba');
    Route::get('prueba', 'HomeController@prueba');    

    //Route::get('home', ['as' => 'empleadoVehiculo.create_events2', 'uses' => 'HomeController@create_events2']);

    Route::resource('home', 'HomeController@empleado');
  //  Route::get('empleadoVehiculo/{id}', 'HomeController@empleadoVehiculo');

    Route::get('api/dependent-dropdown','APIController@index');
Route::get('getempleadoVehiculoList','HomeController@getempleadoVehiculoList');
Route::get('api/get-city-list','APIController@getCityList');

Route::get('json-empleadoVehiculo', function(){
    $emp_id = Input::get('emp_id');

    $empleadoVehiculo = DB::table('empleado')->join('empleadoVehiculo', 'empleado.id', '=', 'empleadoVehiculo.empleado_id')->join('vehiculo', 'empleadoVehiculo.id', '=', 'vehiculo.id' );

    return response::json($empleadoVehiculo);
});
Route::get('obtenerVehiculos/{empleado_id}', 'HomeController@obtenerVehiculos');
Route::get('obtenerRutas/{vehiculo_id}', 'HomeController@obtenerRutas');


// generar pdf
//Route::get('generarpdf', 'HomeController@generarpdf');

Route::get('generarpdfempleados', function(){
    $empleado = App\Empleado::all();
    $pdf = PDF::loadView('generarpdfempleados', ['empleado' => $empleado]);
    return $pdf->download('empleados.pdf');
});


Route::get('generarpdfvehiculos', function(){
    $vehiculo = App\Vehiculo::all();
    $pdf = PDF::loadView('generarpdfvehiculos', ['vehiculo' => $vehiculo]);
    return $pdf->download('vehiculos.pdf');
});

Route::get('generarpdfrutas', function(){
    $ruta = App\Ruta::all();
    $pdf = PDF::loadView('generarpdfrutas', ['ruta' => $ruta]);
    return $pdf->download('rutas.pdf');
});

//Horas extras

Route::get('HorasExtras', 'HomeController@hora')->name('home.horas_extras')
        ->middleware('permissionshinobi:home.horas_extras');
//buscar empleados para saber horas trabajadas

Route::post("HorasExtrasBuscar", "HomeController@search")->name('home.horas_extras')
        ->middleware('permissionshinobi:home.horas_extras');
    // Route::get("HorasExtrasBuscar", "HomeController@search")->name('search');
    

//Reportes reportes.rutas_conductor
//Route::get('reporte_Ruta_Conductor', 'HomeController@ruta_vehiculo')->name('home.rutas_conductor')
 //       ->middleware('permissionshinobi:home.rutas_conductor');


//Buscador reportes rutas por conductor
//Route::get('buscaHorasExtras', 'HomeController@hora')->name('home.horas_extras')
  //      ->middleware('permissionshinobi:home.horas_extras');
//buscar empleados para saber horas trabajadas

//Route::post("buscar_Ruta_Conductor", "HomeController@search_ruta_vehiculo");


//Routes roles y permisos------------------------------------------

    //   'roleshinobi'
//   'permissionshinobi'

//Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permissionshinobi:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permissionshinobi:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permissionshinobi:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permissionshinobi:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permissionshinobi:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permissionshinobi:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permissionshinobi:roles.edit');

        //Extra de usuarios Show, para permisos

        Route::get('admin/{admins}', 'AdminController@show')->name('users.show')
        ->middleware('permissionshinobi:users.show');




//Buscador reportes
/*  Route::get('reporte/searchredirect', function(){


        /* Nuevo: si el argumento search está vacío regresar a la página anterior 
        if (empty(Input::get('search_ruta_vehiculo'))) return redirect()->back();

        $search = urlencode(e(Input::get('search_ruta_vehiculo')));
        $route = "reporte/search_ruta_vehiculo";
        return redirect($route);
    });*/

//    Route::get("reporte/{search_ruta_vehiculo}", "HomeController@search_ruta_vehiculo");


//Route::get('reporte_vehiculo_ruta', 'HomeController@vehiculo_ruta')->name('home.conductores_vehiculos')
  //      ->middleware('permissionshinobi:home.conductores_vehiculos');
   

//Route::get('reporte_Ruta_Conductor', 'HomeController@reporte'); 
//Route::post("reporte_Ruta_Conductor_Buscar", "HomeController@search_ruta_vehiculo");

//Route::get('live_search', 'HomeController@index');
//Route::get('live_search/action', 'HomeController@action')->name('live_search.action');



Route::get('reporte_Ruta_Conductor', function(){
    $ruta_conductor = DB::table('empleado')
        ->join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', '=', 'empleado.id')
        ->join('vehiculo', 'vehiculo.id', '=', 'empleadoVehiculo.vehiculo_id')
        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')
        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')
        //->select('rutas.name','rutas.id',  'empleado.name as name_emp')    
        ->select('empleado.name', 'rutas.name as nombre_ruta' )

        ->get();           
        
      // echo '<pre>';print_r($ruta_conductor);die();    
  $salida = array();
            foreach($ruta_conductor as $emp){
            //     foreach($emp as $r){
            $fila['name'] = $emp->name;
            $fila['nombre_ruta'] = $emp->nombre_ruta;
            //$fila['name'] = $r->name;
            $salida[]=$fila;
              //   }
        }
        return View('reporte_Ruta_Conductor', ['datos' => $salida]);//array()]);//$ruta_conductor]);//->with('ruta_conductor',$ruta_conductor);
    //return view('reporte_Ruta_Conductor');
});

Route::post('reporte_Ruta_Conductor', function(){
    $keyword = Input::get('keyword');

    $empleado = Empleado::join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', '=', 'empleado.id')
        ->join('vehiculo', 'vehiculo.id', '=', 'empleadoVehiculo.vehiculo_id')
        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')
        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')
        ->where('empleado.name', "LIKE", '%'.$keyword.'%')
        //->where('rutas.name', "LIKE", '%'.$keyword.'%')
        ->select('empleado.name', 'rutas.name as nombre_ruta' )
        //->orderby('id', 'asc')
        ->get(); 
 //   $empleado = Empleado::where('name', 'LIKE', '%'.$keyword.'%' )
   // ->get();
//echo '<pre>';print_r($empleado);die();    
        $salida = array();
            foreach($empleado as $emp){
            //     foreach($emp as $r){
            $fila['name'] = $emp->name;
            $fila['nombre_ruta'] = $emp->nombre_ruta;
            //$fila['name'] = $r->name;
            $salida[]=$fila;
              //   }
        }
 return View('reporte_Ruta_Conductor', ['datos' => $salida]);
/*

    var_dump('search result');
    foreach($empleado as $emp){
     var_dump($emp->id);
        var_dump($emp->name);
        //$empleado->name;
        //$rutas->name;
       
    }*/
});
//-----------------------------------------
//Reporte Rutas
Route::get('reporte_vehiculo_ruta', function(){
        $keyword = Input::get('keyword');


         $vehiculo_ruta = DB::table('vehiculo')

        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')

        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')
        ->where('vehiculo.matricula', "LIKE", '%'.$keyword.'%')
        ->select('rutas.name','rutas.id',  'vehiculo.matricula')
        
        //->where('rutas.name', "LIKE", '%'.$keyword.'%')

        
        ->get();                     
        
      // echo '<pre>';print_r($ruta_conductor);die();    
  $salida = array();
            foreach($vehiculo_ruta as $rut){
            //     foreach($emp as $r){
           // $fila['name'] = $rutacreate->name;
            $fila['matricula'] = $rut->matricula;
            $fila['name'] = $rut->name;
            $salida[]=$fila;
              //   }
        }
        return View('reporte_vehiculo_ruta', ['datos' => $salida]);//array()]);//$ruta_conductor]);//->with('ruta_conductor',$ruta_conductor);
    //return view('reporte_Ruta_Conductor');
});

Route::post('reporte_vehiculo_ruta', function(){
    $keyword = Input::get('keyword');

   
        $vehiculo_ruta = DB::table('vehiculo')

        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')

        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')
        ->where('vehiculo.matricula', "LIKE", '%'.$keyword.'%')
        ->select('rutas.name','rutas.id',  'vehiculo.matricula')
        
        //->where('rutas.name', "LIKE", '%'.$keyword.'%')

        
        ->get();             
        
 //   $empleado = Empleado::where('name', 'LIKE', '%'.$keyword.'%' )
   // ->get();
//echo '<pre>';print_r($empleado);die();    
        $salida = array();
            foreach($vehiculo_ruta as $rut){
            //     foreach($emp as $r){
           // $fila['name'] = $rutacreate->name;
            $fila['matricula'] = $rut->matricula;
            $fila['name'] = $rut->name;
            $salida[]=$fila;
              //   }
        }
 return View('reporte_vehiculo_ruta', ['datos' => $salida]);
/*

    var_dump('search result');
    foreach($empleado as $emp){
     var_dump($emp->id);
        var_dump($emp->name);
        //$empleado->name;
        //$rutas->name;
       
    }*/
});
