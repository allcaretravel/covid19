<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('login');
// })->name('/');


// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/sign_in', 'App\Http\Controllers\LoginController@index');
Route::get('/sign_out', 'App\Http\Controllers\LoginController@logout');
Route::get('/sign_up', 'App\Http\Controllers\RegisterController@index');
Route::get('/sign_up/checkRegister', 'App\Http\Controllers\RegisterController@checkRegister');
Route::get('/login/checklogin', 'App\Http\Controllers\LoginController@checklogin');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/filterArea', 'App\Http\Controllers\HomeController@filterArea')->name('filterArea');
Route::get('/get_chart_totalCase', 'App\Http\Controllers\HomeController@get_chart_totalCase');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');