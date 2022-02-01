<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planformation;
use App\Models\Questionnaire;


class QuestionnaireController extends Controller
{


    public function add(Request $request){


        $request->validate([
            'listformation_id' => ['required'],
            'question' => ['required'],
            'choiceA' => ['required'],
            'choiceB' => ['required'],
            'response' => ['required'],

        ]);

        $quizz = new Questionnaire([
            'listformation_id' => $request->listformation_id,
            'question' => $request->question,
            'choiceA' => $request->choiceA,
            'choiceB' => $request->choiceB,
            'choiceC' => $request->choiceC,
            'choiceD' => $request->choiceD,
            'response'=>$request->response,

        ]);
        $quizz->save();
        return response()->json($quizz);
    }



    public function index()
    {

        $questionnaire = Questionnaire::with('listformation', 'ligneplanformations')->get();
        return  $questionnaire ;

    }

}


