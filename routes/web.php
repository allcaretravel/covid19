<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('register',[RegisterController::class,'create_account'])->name('create_account');
Route::post('register',[RegisterController::class,'register'])->name('register');
Route::get('sign_in',[RegisterController::class,'sign_in_form'])->name('sign_in_form');
Route::post('sign_in',[RegisterController::class,'sign_in'])->name('sign_in');
Route::get('sign_out',[RegisterController::class,'sign_out'])->name('sign_out');


Route::get('entry',[BackendController::class,'entry'])->name('entry');
Route::post('entry',[BackendController::class,'store_entry'])->name('store_entry');
Route::any('listing',[BackendController::class,'case_listing'])->name('listing');
Route::get('provinces',[BackendController::class,'province_list'])->name('province_list');
Route::get('create-province',[BackendController::class,'create_province'])->name('create_province');
Route::post('provinces',[BackendController::class,'store_province'])->name('store_province');
