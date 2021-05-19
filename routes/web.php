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
Route::get('register',[RegisterController::class,'CreateAccount'])->name('CreateAccount');
Route::post('register',[RegisterController::class,'Register'])->name('Register');
Route::get('sign-in',[RegisterController::class,'SignInForm'])->name('SignInForm');
Route::post('sign-in',[RegisterController::class,'SignIn'])->name('SignIn');
Route::get('sign-out',[RegisterController::class,'SignOut'])->name('SignOut');


Route::group(['middleware' => 'auth'],function (){
    Route::get('entry',[BackendController::class,'Entry'])->name('Entry');
    Route::post('entry',[BackendController::class,'StoreEntry'])->name('StoreEntry');
    Route::any('listing',[BackendController::class,'CaseListing'])->name('listing');
    Route::get('provinces',[BackendController::class,'ProvinceList'])->name('ProvinceList');
    Route::get('create-province',[BackendController::class,'CreateProvince'])->name('CreateProvince');
    Route::post('provinces',[BackendController::class,'StoreProvince'])->name('StoreProvince');
});
