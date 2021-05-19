<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Contenuformation;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\PlanFormation;
use App\Models\LigneFormation;

use App\Models\Questionnaire;
use App\Models\LignePlanFormation;
use App\Models\ContenuQuestionnaire;
use App\Models\Contenuquestionnaire as ModelsContenuquestionnaire;
use App\Models\Information;


class TestController extends Controller
{

    public function Test(Request $request)
    {
         //---------RELATIONSHIP DES USERS VALIDE (USER + CLIENT )---------
        // $test = User::find(1)->client;
        //permet de tester le rattachement client

        // return User::with('role', 'client')->get(); //permet de tester tous les rattachements



        //---------RELATIONSHIP FORMATION VALIDE ( CLIENT + PLANFORMATION + USER + INFORMATION ) ---------
        // $test = Formation::all();
        // $test = User::with('formations')->find(1);
        // $test2 = User::find(1);

        // return [$test, $test2];

        //  $test = Information::with('formations')->find(1);

        // return $test;

        // $test = formation::with('planformation')->find(1);

        // return $test;




         //---------RELATIONSHIP LIGNE FORMATION  VALIDE ( PLANFORMATION + CONTENUFORMATION)---------


        //

        // $test = Ligneformation::with('planformations')->find(1);

        // return $test;

        // $test = Ligneformation::with('Planformations')->find(1);

        // return $test;


         //---------RELATIONSHIP CONTENUQUESTIONNAIRE ( CONTENUFORMATION + QUESTIONNAIRE )---------
        // $test = LignePlanFormation::all();


       $test = Contenuquestionnaire::with('questionnaires')->find(1);

       return $test;

        //



    }
}
