<?php

namespace App\Http\Controllers;

use App\Models\Souscategorie;
use Illuminate\Http\Request;

class SousCategoriesController extends Controller
{
    public function index()
    {


        $listcontenus= Souscategorie::with('contenus')->get();


        return  $listcontenus ;

    }

    public function listcontenus(Souscategorie $id)
    {
    $id->contenus;
     return response()->json($id);
    }

}
