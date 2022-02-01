<?php

namespace App\Http\Controllers;

// use Dotenv\Exception\ValidationException;
use App\Models\Users;
use App\Models\Client;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use \Illuminate\Validation\ValidationException;




class LoginController extends Controller
{
    public function login(Request $request)
    {


       if (Auth::attempt($request->only('email', 'password'))) {
           return response()->json(Auth::user(), 200);
       }
            throw ValidationException::withMessages([
           'email' => ['The provided credentials are incorrect.']
       ]);

    // $credentials = $request->only('email', 'password');
    // dd($credentials);

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return response()->json(Auth::user(), 200);
    //     }
    //     throw ValidationException::withMessages([
    //         'email' => ['The provided credentials are incorrect.']]);
     }


    public function logout()
    {
        Auth::logout();
    }


    public function getUser()
    {

        return response()->json(Auth::user(), 200);
    }




}
