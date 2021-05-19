<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Listformation;
use App\Models\Souscategorie;

class ListFormationsController extends Controller
{
    public function index()
    {


        $listsouscategories = Listformation::with('souscategories')->get();

        //  foreach($listsouscategories as $listsouscategorie){
        //      echo $listsouscategorie->souscategories;
        //  }
        //  return $listsouscategories;
        return  $listsouscategories ;

    }

    public function listsouscategories(Listformation $id)
    {
    $id->souscategories;
     return response()->json($id);
    }









}

