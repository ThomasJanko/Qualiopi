<?php

namespace App\Http\Controllers;
use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{

    //Ajouter une date pour la formation
    public function add(Request $request){

        $request->validate([

            'dateformation' => ['required'],
            'heuredebut' => ['required'],
            'heurefin' => ['required']

        ]);

        $date = new Date([

            'dateformation' =>$request->dateformation,
            'heuredebut' =>$request->heuredebut,
            'heurefin' =>$request->heurefin
        ]);

        $date->save();

        return response()->json('date added');

    }

    //Récuperer une date
    public function index(Request $Request)
    {
        $dates = Date::all();//->toArray();
        return response()->json($dates);  //all clients
    }


    //Modier une date pour la formation
    public function update(Request $request)
    {
        $this->validate($request, [

            'dateformation' => 'required',
            'heuredebut' => 'required',
            'heurefin' => 'required'

        ]);

        //  DD($request->all());
        $date = Date::find($request->id);
        $date->update($request->all());


        return response()->json('the date has been update with sucess');
    }

    //Supprimer une date pour la formation
    public function delete($id)
    {
        $date = Date::find($id);
        $date->delete();
        return response()->json('date deleted');
    }

}
