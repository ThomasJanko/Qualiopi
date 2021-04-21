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

// Création des routes pour la création des différents users
Route::post('/test', 'App\Http\Controllers\RegisterController@register');
Route::post('/register', 'App\Http\Controllers\RegisterController@register');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
Route::get('/test', 'App\Http\Controllers\UserController@index');
Route::get('/edit/user/{id}', 'App\Http\Controllers\LoginController@edit');
Route::post('/update/user', 'App\Http\Controllers\LoginController@udpate');
Route::delete('/deactivate/user/{id}', 'App\Http\Controllers\UserController@deactivate');


// Création des routes pour la création des formations

Route::post('creation/formation/', 'App\Http\Controllers\FormationController@add');
Route::post('update/formation/', 'App\Http\Controllers\FormationController@edit');
Route::get('delete/formation/', 'App\Http\Controllers\FormationController@delete');

//




Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\LoginController@getUser');

// Route :: group (['middleware' => ' formateur '], function () {
//     Route :: get ('/formateur/home', 'App\Http\Controllers\HomeFormateur@index');
// });
