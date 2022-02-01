<?php

use App\Models\User;
use APP\Models\Formation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
// Route::get('/plop', function(){
//     $user =  User::create([
//         'name' => 'thibaut',
//         'surname' => 'leriteau',
//         'email' => 'thibaut.leriteau@gmail.com',
//         'password' => Hash::make('thibaut.leriteau@gmail.com'),
//         'client_id'=>'1',
//         'role_id'=>'1'
//     ]);

// });

// Route::get('/', function() {

// $formation = Formation::find(7);
// $formation->delete();
// $formations = Formation::all();

// return view('home', compact('formations'));

// });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
