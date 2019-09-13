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
Route::get('/visualizza','HomepageController@show')->name('public.show');
Route::get('/search', 'SearchController@index')->name('public.search'); // Rotta pagina di ricerca


Route::get('/show','EmailController@contatta_host')->name('show.form');
Route::post('/show','EmailController@invio_messaggio')->name('show.store');
Route::get('/messaggio_inviato','EmailController@messaggio_inviato')->name('messaggio_inviato');

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
	Route::get('/mails','EmailController@visualizza_email')->name('mails.index');
	Route::get('/mails/{id}','EmailController@visualizza_singolaemail')->name('mails.show');
});
