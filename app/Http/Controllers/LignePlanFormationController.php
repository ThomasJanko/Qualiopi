<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ligneplanformation;
use App\Models\Planformation;

class LigneplanformationController extends Controller
{
    public function index()
    {
        $ligneformations = Ligneplanformation::all();
        return response()->json($ligneformations);
    }

    public function add(Request $request){




        // $lignes = new Ligneplanformation([
        //     'planformation_id' => $request->planformation_id,
        //     'Categorie' => $request->Categorie,
        //     'SousCategorie' => $request->SousCategorie,
        //     'Contenu'=>$request->Contenu,

        // ]);



        // return response()->json($ligneformation);
    }

    public function update(Request $request, Ligneplanformation $id){


        $id->questionnaire_id = $request->questionnaire_id;
        $id->save();

    }



    public function lignesFormation(Planformation $id) //Récupération les lignes d'une formation
    {
        $id->formation;
        $id->ligneplanformations;

        $lignes = $id->ligneplanformations->all();

        $questionnaire = [];
        foreach ($lignes as $ligne){
           array_push($questionnaire, $ligne->questionnaire);

        }



        return response()->json($id);
    }



}
