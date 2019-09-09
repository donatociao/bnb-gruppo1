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
Route::get('/', 'HomepageController@index')->name('homepage');

Route::get('/contatta_host','EmailController@contatta')->name('contatta.form');
Route::post('/contatta_host','EmailController@leggiMessaggio')->name('contatta.store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/apartments','ApartmentsController');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


  //Appartamenti
  Route::get('/apartments-list', 'ApartmentsController@index')->name('apartmentsIndex');
});

// Rotta pagina di ricerca
Route::get('/search', 'SearchController@index')->name('search');
