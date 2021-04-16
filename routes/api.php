<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::post('/register', 'App\Http\Controllers\RegisterController@register');
Route::post ('/login', 'App\Http\Controllers\LoginController@login');
Route::post ('/logout', 'App\Http\Controllers\LoginController@logout');




Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\LoginController@getUser');

// Route :: group (['middleware' => ' formateur '], function () {
//     Route :: get ('/formateur/home', 'App\Http\Controllers\HomeFormateur@index');
// });
