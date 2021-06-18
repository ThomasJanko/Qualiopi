<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Validation\ValidationException;

class UserController extends Controller

{

    //CREATION D'UN USER (FORM)
    public function register(Request $request){


        $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

       $user =  User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'client_id'=>$request->client_id,
            'role_id'=>$request->role_id,
        ]);

        return $user;
    }


    //AUTHENTIFICATION D'UN USER (FORM)
    public function login(Request $request)
    {
       if (Auth::attempt($request->only('email', 'password'))) {
           return response()->json(Auth::user(), 200);
       }
            throw ValidationException::withMessages([
           'email' => ['The provided credentials are incorrect.']
       ]);
    }


    public function logout()
    {
        Auth::logout();
    }


    public function getUser()
    {
        return response()->json(Auth::user(), 200);
    }


    public function index()
    {
        $users = User::with('client')->get();//->toArray();
        //return response()->json(['users'=>$users]);  //all users
        return response()->json($users);
    }



    public function listUserOfClient(Client $id) //Récupération des Utilisateurs d'un client précis.
    {
        return response()->json($id->users,200); //récupération des users(relation) de la variable correspondant au model Client
    }


    public function listUserByRole(Role $id) // route api à faire USer/Role/{id}
    {
        $id->users->all();
        return response()->json($id);
    }



    //DESACTIVER LE COMPTE D'UN UTILISATEUR EXISTANT
    public function deactivate(User $id)
    {

        $id->delete();
        return response()->json('user deactivate');
    }


    //    public function index($id)
    // {
    //     $user = User::find($id);
    //     return response()->json($user); //index afficher users by id
    // }

}
