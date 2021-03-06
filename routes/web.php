<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('welcome');
});

Route::get('login', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('reportes', 'PdfController@index');
    Route::get('crear_reporte_por_miembros_activos/{tipo}', 'PdfController@crear_reporte_usuario_activo');
    Route::get('crear_reporte_por_miembros_pasivos/{tipo}', 'PdfController@crear_reporte_usuario_pasivo');
    Route::get('crear_reporte_por_todos/{tipo}', 'PdfController@crear_reporte_todos');

    Route::get('/home', function () {
        return redirect('dashboard');
    });
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');


    Route::post('crear_rol', 'UsuariosController@crear_rol');
    Route::get('/listado_roles', 'UsuariosController@listado_Roles');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::get('/listado_permisos', 'UsuariosController@listado_Permisos');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');


    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');


Route::get('dashboard', function()
{
    return view('dashboard');
});

Route::resource('member', 'MemberController');
Route::post('searchMember', 'MemberController@search');

Route::resource('pagos', 'PagosController');

Route::resource('city', 'CityController');
Route::post('searchCity', 'CityController@search');

Route::resource('delegation', 'DelegationController');
Route::post('searchDelegation', 'DelegationController@search');

Route::resource('charge', 'ChargeController');
Route::get('create2Charge/{id}', 'ChargeController@create2');
Route::post('store2Charge/{id}', 'ChargeController@store2');
Route::get('edit2Charge/{idM}/{idC}', 'ChargeController@edit2');
Route::patch('update2Charge/{idM}/{idC}', 'ChargeController@update2');

Route::resource('capacitation', 'CapacitationController');
Route::post('searchCapacitation', 'CapacitationController@search');

Route::get('/home', 'HomeController@index')->name('dashboard');



Route::resource('capacitation_member', 'Capacitation_MemberController');
Route::post('search2Capacitation/{id}', 'CapacitationController@search2');
Route::post('searchCapacitationMember/{id}', 'Capacitation_MemberController@search');
Route::post('search2CapacitationMember/{id}', 'Capacitation_MemberController@search2');
Route::get('edit2CapacitationMember/{id}', 'Capacitation_MemberController@edit2');
Route::PATCH('update2CapacitationMember/{id}', 'Capacitation_MemberController@update2');

Route::resource('document', 'DocumentController');

Route::resource('assembly', 'AssemblyController');
Route::get('attendance/{assembly}', 'AssemblyController@attendance');
Route::get('addAttendance/{assembly}', 'AssemblyController@addAttendance');
Route::get('editAttendance/{assembly}', 'AssemblyController@editAttendance');
Route::post('storeAttendance/{assembly}', 'AssemblyController@storeAttendance');
Route::patch('updateAttendance/{assembly}', 'AssemblyController@updateAttendance');
Route::post('searchAssembly', 'AssemblyController@searchAssembly');
Route::post('search2Assembly/{assembly}', 'AssemblyController@search2Assembly');
Route::post('searchAssemblyMember/{assembly}', 'AssemblyController@searchAssemblyMember');
Route::post('search2AssemblyMember/{assembly}', 'AssemblyController@search2AssemblyMember');

Route::resource('topic', 'TopicController');
Route::get('listTopic/{assembly}', 'TopicController@list');
Route::get('topic/create/{assembly}', 'TopicController@create');
});
