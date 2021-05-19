<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Planformation;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    public function add(Request $request){

        $request->validate([ // TODO: Faire les validate
            'name_formation' => ['required'],
            'row.*.dateformation' => ['required'],
            'location_formation' => ['required'],
            // 'state_formation' => ['required'],
            'information_id' => ['required'],
            'client_id' => ['required'],
            'date_id' => ['required'],




        ]);

        $information = new Information;
        $information->contenu = $request->contenu;
        $information->save();

        $formation = new Formation([

            'name_formation' =>$request->name_formation,
            // 'date_formation'=>$request->date_formation[0], //TODO : Comment Gérer une mutilicité de dates? --> réfléchir à la mise en palce d'une table pivbot avec la gestion des dates
            'location_formation'=>$request->location_formation,
            'state_formation'=>$request->state_formation,
            'information_id'=>$information->id,
            'planformation_id'=>$request->planformation_id,
            'client_id'=>$request->client_id,
            'date_id'=>$request->date_id,
            'user_id'=>$request->user_id,

        ]);

        //Sync les User et la Formation pour attacher les stagiares + Formateur  +  Client + Commercial

        $formation->save();

        //Liaison des utilisateurs à la formation
        $formation->users()->sync($request->listUserFormation);

        //Liaison des dates à la formation
        $formation->dates()->sync($request->listDate);

        $formation->save();


        return response()->json('formation added');






    //    $formation = new Formation;
    //    $formation->name_formation = $request->name_formation;
    //    $formation->date_formation = $request->date_formation[0];
    //    $formation->location_formation = $request->location_formation;
    //    $formation->information_id = $information->id;

    //    $formation->save();





        // Formation::create([
        //     'name_formation' => $request->name_formation,
        //     'date_formation' => $request->date_formation,
        //     'location_formation' => $request->location_formation,

        // ]);
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

            //$formations = Auth::user()->formations->with('information');//->toArray();

             //return response()->json(['users'=>$users]);  //all users

        }
            //$information = new Information;
            //$information->save();
            //$information = Information::where('contenu','test')->all();

        // $formation = new Formation;
        //     $formation->save();
        // $formation->informations()->attach($information);



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

}
