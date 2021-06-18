<?php

namespace App\Http\Controllers;

use App\Models\Ligneplanformation;
use Illuminate\Http\Request;
use App\Models\Planformation;

class PlanFormationController extends Controller
{



    public function add(Request $request){


        $request->validate([
            'name_formation' => ['required'],
            'time_formation' => ['required'],
            'formation_id' => ['required'],
            'user_id' => ['required']
        ]);

        $plan = new Planformation([
        'name_formation' => $request->name_formation,
        'time_formation' => $request->time_formation,
        'formation_id' => $request->formation_id,
        'user_id'=>$request->user_id,

        ]);

        $plan->save();

            //creer chaque ligne designées du tab dans un seul contenue coté vue js
            foreach ($request->contenuFormation as $ligne) {
                 //planformation_id est un index du style [0]
                $ligne['planformation_id'] = $plan->id;

                $item = new Ligneplanformation($ligne);
                //dd( $item , $request->contenuFormation,$ligne);

                 $item->save();

             };

        return response()->json($plan);
    }


    public function infosPlanformation()
        {
            $planformations = Planformation::with('ligneplanformations')->get();
            return response()->json($planformations);
        }


        public function PlanFormation(Planformation $id) //Récupération du plan d'une formation
        {
            $id->formation;
            $id->ligneplanformations;
            // dd($id);

            return response()->json($id); //recuperation des formations (relation) de la variable correspondant au model formations
        }
}
