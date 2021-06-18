<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Information;
use App\Models\User;
use App\Models\Date;
use App\Models\Planformation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    public function add(Request $request){

        $request->validate([
            'name_formation' => ['required'],
            'row.*.dateformation' => ['required'],
            'location_formation' => ['required'],
            // 'state_formation' => ['required'],
            'information_id' => ['required'],
            'client_id' => ['required'],
            'user_id' => ['required'],
            // 'date_id' => ['required'],

        ]);


        //test recuperation date


        $information = new Information;
        $information->contenu = $request->contenu;
        $information->save();

        $formation = Auth::user()->formations;

        $formation = new Formation([

            'name_formation' =>$request->name_formation,
            'location_formation'=>$request->location_formation,
            'state_formation'=>$request->state_formation,
            'information_id'=>$information->id,
            'client_id'=>$request->client_id,
            // 'date_id'=>$request->date_id,
            'user_id'=>$request->user_id,

        ]);
        $formation->save();


                foreach ($request->dateFormation as $ligne) {
                $ligne['formation_id'] = $formation->id;
                $item = new Date($ligne);


                    $item->save();

                }
        //Sync les User et la Formation pour attacher les stagiares + Formateur  +  Client + Commercial

        $formation->save();

        //Liaison des utilisateurs à la formation
        $formation->users()->sync($request->listUserFormation);


        return response()->json($formation);
    }

    public function index()
        {
            $formations = Formation::all();
            return response()->json($formations);
        }

    public function indexUserAuth()
        {

             //$formations = Formation::with('Informations')->find(Auth::id());
             $formations = Auth::user()->formations;
             foreach($formations as $formation){
                $formation->informations;
             };


             return response()->json($formations->toArray());



        }



        public function infosFormation(Formation $id) //Récupération des infos d'une formation
    {
        $id->users;
        $id->informations;
        $id->client;
        $id->dates;
        $id->planformation;



        return response()->json($id); //recuperation des formations (relation) de la variable correspondant au model formations
    }

    // public function PlanFormation(Formation $id) //Récupération du plan d'une formation
    // {
    //     $id->planformation;
    //     // $id->ligneplanformations;
    //     dd($id);

    //     return response()->json($id); //recuperation des formations (relation) de la variable correspondant au model formations
    // }

    public function infosDates(Formation $id)
    {
        $formations = Formation::with('dates')->get();
        return response()->json($id);
    }

    public function updateState(Request $request, Formation $id){

        $request->validate([
            'state_formation'=>['required'],

        ]);

            //on compare le mot de passe courant entré par l'utilisateur avec celui en base

            // $request->formation()->fill(['state_formation' => Formation::make($new_state)])->save();
            // return 'true';

        $id->state_formation =  $request->state_formation;
        $id->save();

    }




}
