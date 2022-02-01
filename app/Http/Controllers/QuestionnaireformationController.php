<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Questionnaireformation;
use Illuminate\Support\Facades\Validator;

class QuestionnaireformationController extends Controller
{


    public function add(Request $request){

        // array of array To array of object (+ foreach)
        $validator = Validator::make($request->all(), [

            'repQuestionnaire.*.user_id' => ['required'],
            'repQuestionnaire.*.formation_id'=> ['required'],
            'repQuestionnaire.*.question'=> ['required'],
            'repQuestionnaire.*.response'=> ['required'],
            'repQuestionnaire.*.userResponse'=> ['required'],
            'repQuestionnaire.*.validation'=> ['required'],

        ]);

        foreach ($request->repQuestionnaire as $ligne) {

            $quizz = new Questionnaireformation($ligne);

            $quizz->save();
            // return response()->json($quizz);
        }
    }


    public function index()
    {


        $questionnaireformation = Questionnaireformation::all();

        return  $questionnaireformation ;

    }
}
