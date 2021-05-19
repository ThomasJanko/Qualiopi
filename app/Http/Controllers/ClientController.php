<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'social_reason' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'address' => ['required'],
            'city' => ['required'],
            'postal' => ['required'],
            'country' => ['required']
        ]);

        Client::create([
            'social_reason' => $request->social_reason,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postal' => $request->postal,
            'country' => $request->country,

        ]);

        return response()->json("Client enregistré" , 200);
    }


    public function indexClient(Request $Request)
    {
        $clients = Client::all();//->toArray();
        return response()->json($clients);  //all clients
    }


    public function deactivate($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json('client deactivate');
    }
}
