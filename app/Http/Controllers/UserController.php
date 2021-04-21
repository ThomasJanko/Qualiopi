<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller

{



    public function index(Request $Request)

    {
        $users = Users::all();//->toArray();
        return response()->json(['users'=>$users]);  //all users
    }


    public function deactivate($id)

    {

        $user = Users::find($id);
        $user->delete();

        return response()->json('user deactivate');


    }


    // //    public function index($id)
    // {
    //     $user = User::find($id);
    //     return response()->json($user); //index afficher users by id
    // }
}
