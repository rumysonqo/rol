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

Route::get('admin', function(){
	return view('admin.dashboard');
});

Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('profesion','Ctrl_profesion');
});

Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('condicion','Ctrl_condicion');
});

Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('micro_red','Ctrl_micro_red');
});

Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('establecimiento','Ctrl_establecimiento');
});

Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('personal','Ctrl_personal');
});

Route::get('calendario','Ctrl_calendario@index');

Route::post('grabar_calendario',function(){
	return 'hola';
});




/*Route::group(['prefix'=>'mantenimiento'],function(){
	Route::resource('rol','Ctrl_rol');
});*/

