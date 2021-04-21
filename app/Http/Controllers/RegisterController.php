<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;




class RegisterController extends Controller
{



    public function register(Request $request){

        $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        Users::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}

