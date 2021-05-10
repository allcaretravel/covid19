<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BackendController;

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
    return view('index');
});

Route::get('/register', [RegisterController::class, 'createRegister']);
Route::post('/register_action', [RegisterController::class, 'register']);

Route::get('/signin', [RegisterController::class, 'showLogin']);
Route::post('/check', [RegisterController::class, 'login']);

Route::get('/signout', [RegisterController::class, 'logout']);

Route::resource('covid',  BackendController::class);
Route::get('/entry', [BackendController::class, 'displayEntry']);
Route::post('entry/fetch', [BackendController::class, 'fetch'])->name('dynamicdependent.fetch');
Route::get('/listing', [BackendController::class, 'displayListing']);
Route::get('/search', [BackendController::class, 'search']);
