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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');

});

/* 

Protect create, update, delete routes with middleware
*/

Route::get('index', 'App\Http\Controllers\ArticleController@index');

Route::group([

    'middleware' => 'api',
    

], function ($router) {    
   Route::post('/articles', 'App\Http\Controllers\ArticleController@store');
   Route::put('/articles/{id}', 'App\Http\Controllers\ArticleController@update');
   Route::delete('/articles/{id}', 'App\Http\Controllers\ArticleController@destroy');

});