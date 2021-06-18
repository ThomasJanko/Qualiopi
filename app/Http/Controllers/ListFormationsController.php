<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Listformation;
use App\Models\Souscategorie;

class ListFormationsController extends Controller
{





    public function add(Request $request){



        $request->validate([
            'categorie_id' => ['required'],
            'souscategorie_id' => ['required'],
            'contenu' => ['required'],
        ]);

        $listformation = new Listformation([


            'categorie_id'=>$request->categorie_id,
            'souscategorie_id' =>$request->souscategorie_id,
            'contenu'=>$request->contenu,



        ]);
        $listformation->save();
        return response()->json($listformation);





    }

    public function delete(int $id)
    {

//         $del=Listformation::find($id);

//    if($del)
//    {
//    // return $user;           <------------------------user exist
//        if($del->delete()){
//          return 'user deleted';
//          }
//     else{
//        return "something wrong";
//         }

//    }
//   else{
//      return "list not exist";// <--------------------user not exist
//     }
      $res = Listformation::findOrFail($id);
      $res->delete();

      return response()->json($res,200);

        // dd($res);
        // if ($res) {
        //     return response()->json([
        //         'status' => 1,
        //         'msg' => 'success'
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 0,
        //         'msg' => 'fail'
        //     ]);
        // }


    //    $res= Listformation::where('id', $id)->delete();
    //    return $res;

    }

    public function addCategorie(Request $request)
    {

        $request->validate([

            'categorie' => ['required'],

        ]);

        Listformation::create([

            'categorie' => $request->categorie,


        ]);

        return response()->json(Listformation::all());
    }

    public function addSousCategorie(Request $request)
    {

        $souscategorie = new SousCategorie;
        $souscategorie->title = $request->title;
        $souscategorie->save();

        $listformation = new Listformation([


            'categorie'=>$request->categorie,
            'state_formation'=>$request->state_formation,
            'souscategorie_id'=>$souscategorie->id,


        ]);

        return response()->json(Listformation::with('souscategories')->get());
    }


    public function index()
    {


        $listsouscategories = Listformation::with('souscategories','categories')->get();

        return  $listsouscategories ;

    }


    public function listcategories(Listformation $id)
    {
    $id->categories;
     return response()->json($id);
    }

    public function listsouscategories(Listformation $id)
    {
    $id->souscategories;
     return response()->json($id);
    }

    public function listcontenus(Listformation $id)
    {
    $id->all();
     return response()->json($id);
    }


    // public function categories()
    // {
    // $categories = Categorie::all();
    //  return response()->json($categories);
    // }

    // public function souscategories()
    // {$souscategories = Listformation::with('souscategories')->get();
    //  return response()->json($souscategories);
    // }
    public function contenus()
    {
    $contenus = Listformation::all();
     return response()->json($contenus);
    }











}

