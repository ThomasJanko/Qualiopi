<?php

namespace App\Http\Controllers;
use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DateController extends Controller
{

    //Ajouter une date pour la formation
    public function add(Request $request){

        // array of array To array of object (+ foreach)
        $validator = Validator::make($request->all(), [

            'newdates.*.name' => ['required'],
            'newdates.*.dateid' => ['required'],
            'newdates.*.start'=> ['required'],
            'newdates.*.end'=> ['required'],
            'newdates.*.location'=> ['required'],
            'formation_id'=> ['required'],


        ]);

        foreach ($request->newdates as $ligne) {
            $ligne['formation_id'] = $request->formation_id;
            $date = new Date($ligne);

            $date->save();

        }
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


            'name'=>['required'],
            'dateid'=>['required'],
            'start'=>['required'],
            'end'=>['required'],
            'location'=>['required'],
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


      return response()->json($res, 200);

    }




    public function infoDates(Date $id)
    {
        $formations = Date::with('dates')->get();
    }


    //MODIFICATION DE L'EVENT PAR LE FORMATEUR AVANT LA VALIDATION
    public function updateEvent(Request $request, Date $id){

        $request->validate([
            'name'=>['required'],
            'start'=>['required'],
            'end'=>['required'],
            'location'=>['required'],

        ]);

        $id->name =  $request->name;
        $id->start =  $request->start;
        $id->end =  $request->end;
        $id->location =  $request->location;
        $id->save();

    }

}
