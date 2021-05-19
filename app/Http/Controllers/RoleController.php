<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function register(Request $request){

        $request->validate([

            'name_role'=>['required']
        ]);

        Role::create([

            'name_role' => $request->name_role,
        ]);

        return response()->json("Role enregistré", 200);
    }
}
