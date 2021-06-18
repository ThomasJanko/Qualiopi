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
//List User par role


//route test relationship
Route::get('/test', 'TestController@test');

// Création des routes pour la création des ROLES
Route::post('/register/role', 'RoleController@register');


// Création des routes pour la création des différents CLIENTS
Route::post('/register/client', 'ClientController@register');
Route::get('/edit/client/{id}', 'ClientController@editClient');
Route::get('/info/client', 'ClientController@indexClient');
Route::post('/update/client', 'ClientController@udpateClient');
Route::delete('/deactivate/client/{id}', 'ClientController@deactivateClient');
Route::post('/register', 'RegisterController@create');


// Création des routes pour la création des différents USERS (COMMERCIAL / FORMATEUR / STAGIAIRE)
Route::post('/register', 'UserController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
Route::get('/info/users', 'UserController@index');
Route::get('/edit/user/{id}', 'UserController@edit');
Route::post('/update/user', 'UserController@udpate');
Route::delete('/deactivate/user/{id}', 'UserController@deactivate');
Route::get('/user/index', 'UserController@index');
Route::get('/client/{id}/users', 'UserController@listUserOfClient');
Route::get('/formation/formateur', 'UserController@listFormateur');
Route::get('/user/role/{id}', 'UserController@listUserByRole');


// Création des routes pour la création des FORMATIONS
Route::post('create/formation/', 'FormationController@add');
Route::post('update/formation/', 'FormationController@edit');
Route::get('delete/formation/', 'FormationController@delete');
Route::get('formations/', 'FormationController@index');
Route::get('formations/client', 'FormationController@indexUserAuth');
Route::get('formation/{id}/infos/','FormationController@infosFormation');


// Creation Plan de formation

Route::get('formation/{id}/plan/', 'FormationController@PlanFormation');
Route::get('/planformation', 'PlanFormationController@infosPlanformation');


// Création List  formations
Route::get('/listformations', 'ListFormationsController@index');
Route::post('add/listformation/', 'ListFormationsController@add');
Route::post('update/listformation/{id}', 'ListFormationsController@edit');
Route::get('delete/listformation/{id}', 'ListFormationsController@delete');
Route::get('formation/listformations','ListFormationsController@listFormation');
Route::get('/formation/{id}/listsouscategories','ListFormationsController@listsouscategories');
Route::post('/create/categorie/','ListFormationsController@addCategorie');
Route::post('/create/souscategorie/','ListFormationsController@addSousCategorie');

Route::get('/listformation/contenus','ListFormationsController@contenus');



// List des informations
Route::get('/informations', 'InformationsController@index');

//PLan de formation
Route::post('/create/planformation/','PlanFormationController@add');
Route::post('/formation/{id}/plan/','PlanFormationController@PlanFormation');



//Ligne formation
Route::get('/index/ligneformation/','LigneplanformationController@index');
Route::post('/create/ligneformation/','LigneplanformationController@add');
Route::get('/formation/{id}/lignesformation/','LigneplanformationController@lignesFormation');

//Categories
Route::get('/listcategorie/categories','CategoriesController@index');
Route::get('/listcategorie/categories/all','CategoriesController@indexall');
Route::post('/add/categorie','CategoriesController@add');
Route::post('/edit/categorie','CategoriesController@edit');



// Souscategories
Route::get('/formation/{id}/listsouscategories/','SousCategoriesController@listsouscategories');
Route::get('/formation/{id}/listcategories/','SousCategoriesController@listcategories');
Route::get('/listsouscategorie/souscategories','SousCategoriesController@index');
Route::get('/formation/{id}/listsouscategorie/listcontenus','SousCategoriesController@listcontenus');
Route::post('/add/souscategorie','SousCategoriesController@add');






// Création Dates formations
Route::get('/datesformation', 'DateController@index');
Route::post('create/datesformation/', 'DateController@add');
Route::post('update/datesformation/{id}', 'DateController@edit');
Route::get('delete/datesformation/{id}', 'DateController@delete');





Route::middleware('auth:sanctum')->get('/user', 'LoginController@getUser');

// Route :: group (['middleware' => ' formateur '], function () {
//     Route :: get ('/formateur/home', 'HomeFormateur@index');
// });

//UPDATES
Route::post('/resetPassword', 'RegisterController@resetPassword');

Route::post('/updateState/{id}', 'FormationController@updateState');
