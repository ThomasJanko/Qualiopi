<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planformation;

class PlanFormationController extends Controller
{
    public function index()
        {
            $planformations = Planformation::all();
            return response()->json($planformations);
        }


        public function PlanFormation(Planformation $id) //Récupération du plan d'une formation
        {
            $id->formation;
            $id->ligneplanformations;
            dd($id);

            return response()->json($id); //recuperation des formations (relation) de la variable correspondant au model formations
        }
}
