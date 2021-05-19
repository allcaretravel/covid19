<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@index')->name('index');
Route::get('/sign-up', 'AuthController@signup')->name('sign-up');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'auth', 'prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/signout', 'AuthController@signout')->name('signout');
    Route::get('/covid', 'CovidController@index')->name('covid.index');
    Route::get('/covid/create', 'CovidController@create')->name('covid.create');
    Route::post('/covid/store', 'CovidController@store')->name('covid.store');
});
