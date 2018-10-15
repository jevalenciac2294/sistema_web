<?php

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

Route::get('user', 'UserController@user');

Route::get('user/password', 'UserController@password');
Route::post('user/updatepassword', 'UserController@updatePassword');
//Crear usuario
Route::get('admin/create', 'AdminController@create');
Route::post('user/store', 'UserController@store');
Route::match(['get', 'post'], 'admin/create', 'AdminController@create');
//Route::get('createuser', 'AdminController@createuser');

//crear usuario desde el admin

//crear useruario desde admin
Route::match(['get', 'post'], 'admin/createuser', 'AdminController@createuser');
Route::get('admin/createuser', 'AdminController@createuser');
Route::get('adminuser', 'AdminController@adminuser');

//Ver usuario
Route::get('admin/index', 'AdminController@index');
//destroy usuario
//Route::get('admin/edit', 'AdminController@edit');

Route::post('admin/update/{id}', 'AdminController@update');
Route::get('admin/edit/{id}', 'AdminController@edit');

Route::post('admin/destroy/{id}', 'AdminController@destroy');
Route::get('admin/destroy/{id}', 'AdminController@destroy');

Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');
Route::get('admin', 'AdminController@admin');

//Empleado
//Mostrar empleados
Route::get('indexEmpleado', 'EmpleadoController@indexEmpleado');
Route::post('indexEmpleado', 'EmpleadoController@indexEmpleado');

//Route::get('admin/edit/{id}', 'AdminController@edit');
//agregar empleado

Route::get('createEmpleado', 'EmpleadoController@createEmpleado');
Route::post('createEmpleado', 'EmpleadoController@createEmpleado');
//Editar empelado existente
////Eliminar empleado existente
//Route::delete('/empleado/{id}', function($id){});


Route::post('updateEmpleado/{id}', 'EmpleadoController@updateEmpleado');
Route::get('editEmpleado/{id}', 'EmpleadoController@editEmpleado');

Route::post('destroyEmpleado/{id}', 'EmpleadoController@destroyEmpleado');
Route::get('destroyEmpleado/{id}', 'EmpleadoController@destroyEmpleado');
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

Route::get('createVehiculo', 'VehiculoController@createVehiculo');
Route::post('createVehiculo', 'VehiculoController@createVehiculo');

//Mostrar vehiculos
Route::get('indexVehiculo', 'VehiculoController@indexVehiculo');
Route::post('indexVehiculo', 'VehiculoController@indexVehiculo');

//Route::get('admin/edit/{id}', 'AdminController@edit');

//Editar vehiculo existente
////Eliminar vehiculo existente
//Route::delete('/vehiculo/{id}', function($id){});


Route::post('updateVehiculo/{id}', 'VehiculoController@updateVehiculo');
Route::get('editVehiculo/{id}', 'VehiculoController@editVehiculo');

Route::post('destroyVehiculo/{id}', 'VehiculoController@destroyVehiculo');
Route::get('destroyVehiculo/{id}', 'VehiculoController@destroyVehiculo');


//Route::any("home/front", "HomeController@front");
//Route::post('/Rutas', 'RutasController@searchRutas');

Route::get('rutacreate', 'RutasController@rutacreate');
Route::post('rutacreate', 'RutasController@rutacreate');

Route::get('rutaindex', 'RutasController@rutaindex');
Route::post('rutaindex', 'RutasController@rutaindex');

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

Route::get('destroyruta/{id}', 'RutasController@destroyruta');
Route::post('destroyruta/{id}', 'RutasController@destroyruta');


Route::get('indexubicacion/{ruta_id}', 'RutasController@indexubicacion');
Route::post('indexubicacion/{ruta_id}', 'RutasController@indexubicacion');
Route::get('indexubicacion/{ruta_id}', 'RutasController@indexubicacion');
Route::post('indexubicacion/{ruta_id}', 'RutasController@indexubicacion');

//Route::get('rutaindex', 'RutasVehiculoController@rutavehiculo');
//Route::post('rutaindex', 'RutasVehiculoController@rutavehiculo');
Route::get('obtenerRutas', 'RutasController@obtenerRutas');

Route::post('asignarutasvehiculo', 'RutasVehiculoController@asignarutasvehiculo');
Route::get('asignarutasvehiculo', 'RutasVehiculoController@asignarutasvehiculo');

//Route::post('removerutasvehiculo/{id}', 'RutasVehiculoController@removerutasvehiculo');
//Route::get('removerutasvehiculo/{id}', 'RutasVehiculoController@removerutasvehiculo');
//
//Route::post('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');
//Route::get('destroyRutasVehiculos/{id}', 'RutasVehiculoController@destroyRutasVehiculos');

//-----------------Empleado Vehiculo---------------------------------
Route::get('obtenerVehiculo', 'VehiculoController@obtenerVehiculo');

Route::post('asignaempleadovehiculo', 'EmpleadoVehiculoController@asignaempleadovehiculo');
Route::get('asignaempleadovehiculo', 'EmpleadoVehiculoController@asignaempleadovehiculo');

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
    Route::get('home', 'HomeController@create_events');  
Route::post('home/fetch', 'HomeController@fetch')->name('dynamicdependent.fetch');
Route::post('select',['uses'=>'HomeController@postSelect','as'=>'postSelect']);

//Route::get('createEmpleado', 'EmpleadoController@createEmpleado');
Route::post('eventoPost', 'HomeController@create_events2');

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

Route::get('HorasExtras', 'HomeController@hora');

//buscar empleados para saber horas trabajadas
/*    Route::get('searchredirect', function(){


        Nuevo: si el argumento search está vacío regresar a la página anterior 
        if (empty(Input::get('search'))) return redirect()->back();

        $search = urlencode(e(Input::get('search')));
        $route = "HorasExtras/$search";
        return redirect($route);
    });*/
    Route::post("HorasExtrasBuscar", "HomeController@search");
    // Route::get("HorasExtrasBuscar", "HomeController@search")->name('search');
    