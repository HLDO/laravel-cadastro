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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Cadastros
 */
Route::get('cadastros', 'CadastrosController@index');
Route::get('cadastros/create', 'CadastrosController@create');
Route::get('cadastros/{id}', 'CadastrosController@show');
Route::get('cadastros/{id}/edit', 'CadastrosController@edit');
Route::post('cadastros/store', 'CadastrosController@store');
Route::patch('cadastros/{id}', 'CadastrosController@update');
Route::delete('cadastros/{id}', 'CadastrosController@destroy');

/**
 * Estados
 */
Route::get('estados', 'EstadosController@index');
Route::get('estados/create', 'EstadosController@create');
Route::get('estados/{id}', 'EstadosController@show');
Route::get('estados/{id}/edit', 'EstadosController@edit');
Route::post('estados/store', 'EstadosController@store');
Route::patch('estados/{id}', 'EstadosController@update');
Route::delete('estados/{id}', 'EstadosController@destroy');

/**
 * Users
 */
Route::get('users', 'UsersController@index');
Route::get('users/create', 'UsersController@create');
Route::get('users/{id}', 'UsersController@show');
Route::get('users/{id}/edit', 'UsersController@edit');
Route::post('users/store', 'UsersController@store');
Route::patch('users/{id}', 'UsersController@update');
Route::delete('users/{id}', 'UsersController@destroy');
