<?php

namespace App\Http\Controllers;

// use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Validation\ValidationException;


use App\Models\Users;




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
