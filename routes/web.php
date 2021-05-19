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
Route::get('register',[RegisterController::class,'createAccount'])->name('CreateAccount');
Route::post('register',[RegisterController::class,'register'])->name('Register');
Route::get('sign-in',[RegisterController::class,'signInForm'])->name('SignInForm');
Route::post('sign-in',[RegisterController::class,'signIn'])->name('SignIn');
Route::get('sign-out',[RegisterController::class,'signOut'])->name('SignOut');


Route::group(['middleware' => 'auth'],function (){
    Route::get('entry',[BackendController::class,'entry'])->name('Entry');
    Route::post('entry',[BackendController::class,'storeEntry'])->name('StoreEntry');
    Route::any('listing',[BackendController::class,'caseListing'])->name('listing');
    Route::get('provinces',[BackendController::class,'provinceList'])->name('ProvinceList');
    Route::get('create-province',[BackendController::class,'createProvince'])->name('CreateProvince');
    Route::post('provinces',[BackendController::class,'storeProvince'])->name('StoreProvince');
});
