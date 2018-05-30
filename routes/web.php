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

Route::get('/', function () {
    return view('welcome');
});

Route::get('acerca-de', function () {
    return view('acercade');
});
Route::get('ayuda', function () {
    return view('ayuda');
});

Route::get('sugerencias', function () {
    return view('sugerencias');
});

Route::post('sugerencias', 'UserController@suggestions'); 


Auth::routes();
Route::get('libros/listado','BookController@listado');
Route::resource('libros','BookController');
Route::resource('usuarios','UserController');

Route::resource('eventos','EventController');
Route::get('actividades','EventController@index');
Route::get('reservaciones','EventController@reservaciones');
Route::get('eventos/otrosmes/{mes}','EventController@index');
Route::post('eventos/confirmar','EventController@confirmar');
Route::get('notifications','EventController@notifications');

Route::resource('estudiantes','StudentController');

Route::resource('prestamos','LoanController');
Route::get('prestamos','LoanController@prestamos_agrupados');
Route::get('historial','LoanController@devolvidos');
Route::get('prestamos/{usr}/{fecha}','LoanController@prestamos')->where(['usr' => '[0-9]+']);
Route::get('virtuales','LoanController@noconfirm_agrupados');
Route::get('virtuales/{usr}/{fecha}','LoanController@noconfirm');
Route::get('prestamos/nuevo/{id}','LoanController@create');
Route::get('prestamos/confirmar/{id}','LoanController@confirmar');
Route::get('prestamos/cancelar/{id}','LoanController@cancelar');
Route::post('prestamos/guardar','LoanController@store2');
Route::post('prestamos/devolver/{id}','LoanController@devolver');

Route::get('ejemplares/{id}','ItemController@lista');
Route::get('tesis/{id}','BookController@show'); 
Route::get('ejemplares/create/{id}','ItemController@create');
Route::resource('ejemplares','ItemController');

Route::get('api/etiquetas', 'TagController@index');

Route::get('api/autores', 'AuthorController@index'); 

Route::get('recuperacion', function(){
	return view('users.previo_recuperacion');
} ); 
Route::post('recuperacion', 'UserController@fetchQuestion'); 
Route::put('recuperacion', 'UserController@ask4Pass'); 
Route::post('recuperar', 'UserController@reset'); 


Route::get('listados', 'QueryController@listado'); 
Route::resource('consultas','QueryController');
Route::get('api/consultas', 'QueryController@trueindex'); 
Route::get('reportes', 'QueryController@index2'); 

Route::get('signup', function(){
	return view('auth.register');
});   

Route::get('api/humanos', 'HumanController@index');
Route::get('api/usuarios', 'UserController@index');

Route::get('respaldo', 'InternoController@respaldo'); 
Route::get('foto', 'InternoController@foto'); 
Route::post('foto', 'InternoController@actualizarFoto'); 
Route::post('respaldo', 'InternoController@emitirRespaldo'); 
Route::get('restauracion', 'InternoController@restauracion'); 
Route::post('restauracion', 'InternoController@restaurarBD');
Route::any('bitacora','InternoController@auditoria');
Route::any('estadisticas','InternoController@estadisticas');
Route::any('estadisticas/get/{filtro}','InternoController@getFiltros');
Route::post('estadisticas/Libros','InternoController@libros');
Route::post('estadisticas/Proyectos','InternoController@proyectos');
Route::post('estadisticas/PNF','InternoController@pnfs');
Route::post('estadisticas/Autor','InternoController@autores');
Route::post('estadisticas/Lector','InternoController@lectores');
Route::post('estadisticas/Eventos','InternoController@eventos');

Route::any('estadisticas/sala','InternoController@eventos');
Route::any('estadisticas/carnet','InternoController@carnet');
Route::any('estadisticas/solvencia','InternoController@solvencia');
Route::any('estadisticas/poresp','InternoController@especialidad');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('salir', 'HomeController@saveLogout')->name('salir');
 