<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Souscategorie;

class SousCategoriesController extends Controller
{

    public function indexall()
    {

        $listsouscategorie=Souscategorie::all();

        return $listsouscategorie;
        // $listcontenus= Souscategorie::with('contenus')->get();
        // return  $listcontenus ;

    }
    public function index()
    {


        $listsouscategorie=Souscategorie::with('categorie')->get();

        return $listsouscategorie;
        // $listcontenus= Souscategorie::with('contenus')->get();
        // return  $listcontenus ;

    }

    public function listsouscategories(Categorie $id)
    {

    $id->souscategories;

     return response()->json($id);
    }

    public function add(Request $request){

        $request->validate([

            'title' => ['required'],

        ]);

        $souscat = new Souscategorie([

            'title' =>$request->title,

        ]);

        $souscat->save();

        return response()->json($souscat);

    }


}
