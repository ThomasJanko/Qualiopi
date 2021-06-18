<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {



        $listcategorie=Categorie::has('souscategories')->get();

        foreach($listcategorie as $list)
        { $list->souscategories;

        };

         return response()->json($listcategorie->toArray());



    }

    public function indexall()
    {
        $listcategorie=Categorie::all();
         return response()->json($listcategorie);
    }

    public function add(Request $request){

        $request->validate([

            'title' => ['required'],

        ]);

        $cat = new Categorie([

            'title' =>$request->title,

        ]);

        $cat->save();

        return response()->json($cat);

    }
}
