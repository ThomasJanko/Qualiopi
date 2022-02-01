<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class RegisterController extends Controller
{



    public function register(Request $request){

        $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required'],
            'client_id' => ['required'],
            'role_id' => ['required'],

        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'client_id' => $request->client_id,
            'role_id' => $request->role_id,

        ]);
    }


    /* change password*/
    public function resetPassword(Request $request){

        $request->validate([
            'password'=>['required','confirmed'],
            'CurrentPassword'=>['required'],
        ]);

        $curr_password = $request->CurrentPassword;
        $new_password  = $request->password;

            //on compare le mot de passe courant entré par l'utilisateur avec celui en base
        if(!Hash::check($curr_password,Auth::user()->password)){
            return 'false';
        }
        else{
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return 'true';
        }

    }
}

