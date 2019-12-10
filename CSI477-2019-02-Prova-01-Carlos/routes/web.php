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
})->name('welcome');

Route::get('geral', 'GeralController@index')->name('geral');
Route::get('geral/projetos', 'GeralController@projetos')->name('geralProjetos');
Route::post('geral/pesquisa', 'GeralController@professorArea')->name('geralPesquisa');

Auth::routes();


Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('admin/alunos', 'HomeController@alunos')->name('adminAlunos');
	Route::get('admin/professores', 'HomeController@professores')->name('adminProfessores');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

