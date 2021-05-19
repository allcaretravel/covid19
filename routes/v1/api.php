<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1/admin")
     ->group(function () {
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
});

Route::group([
        'prefix' => 'v1/admin',  
        'middleware' => 'auth:sanctum'
], function(){
        Route::get('/logout', 'AuthController@logout');
        Route::get('/covids', 'CovidController@index');
});