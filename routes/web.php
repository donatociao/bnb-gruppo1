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
    return view('homepage');
});

Route::get('/contatta_host','EmailController@contatta')->name('contatta.form');
Route::post('/contatta_host','EmailController@leggiMessaggio')->name('contatta.store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/apartments','ApartmentsController');
