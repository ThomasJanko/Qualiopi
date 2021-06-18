<?php

namespace App\Http\Controllers;
use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{

    //Ajouter une date pour la formation
    public function add(Request $request){

        $request->validate([

            'name' => ['required'],
            'dateid' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'formation_id' => ['required'],

        ]);

        //CREATION D UNE DATE

        $date = new Date([

            'name'=>$request->name,
            'dateid'=>$request->name->start->end->formation_id, //DATE ID CORRESPOND AU GROUPEMENT DES AUTRES COLONNES
            'start'=>$request->start,
            'end'=>$request->end,
            'formation_id'=>$request->formation

        ]);

        $date->save();



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


            'name'=>'required',
            'dateid'=>'required',
            'start'=>'required',
            'end'=>'required',
            'formation_id'=>['required']

        ]);

        //  DD($request->all());
        $date = Date::find($request->id);
        $date->update($request->all());


        return response()->json('the date has been update with sucess');
    }

    //Supprimer une date pour la formation
    // public function delete($id)
    // {
    //     $date = Date::find($id);
    //     $date->delete();
    //     return response()->json('date deleted');
    // }




    public function delete(int $id)
    {

      $res = Date::findOrFail($id);
      $res->delete();

      return response()->json($res,200);

    }




    public function infoDates(Date $id)
    {
        $formations = Date::with('dates')->get();
    }

}
