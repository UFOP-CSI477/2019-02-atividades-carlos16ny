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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('certificados', 'SubjectController@index')->name('subjects');
	Route::delete('certificados', ['as' => 'subject.destroy', 'uses' => 'SubjectController@destroy']);
	Route::get('certificados/edit', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);
	Route::put('certificados/edit', ['as' => 'subject.edit', 'uses' => 'SubjectController@update']);
	Route::get('certificados/novo', ['as' => 'subject.create', 'uses' => 'SubjectController@create']);
	Route::post('certificados/novo', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);

	Route::get('requisicoes', ['as' => 'requisicoes.index', 'uses' => 'RequestController@index']);
	Route::get('requisicoes/nova', ['as' => 'requisicoes.add', 'uses' => 'RequestController@nova']);
	Route::post('requisicoes/nova', ['as' => 'requisicoes.create', 'uses' => 'RequestController@create']);
});

