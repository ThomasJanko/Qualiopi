<?php

namespace App\Models;

use App\Models\Formation;
use App\Models\Souscategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listformation extends Model
{
    use HasFactory;

    protected $table = 'listformations';
    protected $fillable = ['categorie_id','souscategorie_id','contenu'];


    public function formations()
    {

        return $this->belongsToMany(Formation::class);
    }


    public function souscategories()
    {

        return $this->belongsTo(Souscategorie::class, 'souscategorie_id');

    }

    public function categories()
    {

        return $this->belongsTo(Categorie::class, 'categorie_id');

    }

    public function ligneplanformations()
    {

        return $this->belongsToMany(Ligneplanformation::class);

    }


}
