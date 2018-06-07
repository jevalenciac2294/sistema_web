<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('home/id1/{id1}/id2/{id2}', 'HomeController@getId');
Route::get('home/showview', 'HomeController@showView');

//Peticiones del tipo get y post
//Route::match(["get", "post"], "home/form", "HomeController@form");
Route::any("home/form", "HomeController@form");

Route::get("home/nombre/{nombre}/apellidos/{apellidos}", function($nombre, $apellidos){
    return  $nombre . " " . $apellidos;
})->where(["nombre" => "[a-zA-Z]+", "apellidos" => "[a-zA-Záéíóú]+"]);

Route::get("home/miformulario", "HomeController@miFormulario");

Route::post("home/validarmiformulario", "HomeController@validarMiFormulario");

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');

Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');*/

//Route::get('/', function(){
//return redirect('auth/login');
//});

//Auth::routes();
//
//Route::group(['middleware' => 'auth'], function () {

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

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

	Route::get('/home', 'HomeController@index');
    

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

