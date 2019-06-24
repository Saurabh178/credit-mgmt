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
Route::get('/view_user', 'CreditController@index')->name('display_all');
Route::get('/view_user/{id}', 'CreditController@show')->name('display_single');
Route::post('/view_user/{id}', 'CreditController@update')->name('account_update');

