<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listformation extends Model
{
    use HasFactory;

    protected $table = 'listformations';
    protected $fillable = ['title','categorie','souscategorie_id'];


    public function formations()
    {

        return $this->belongsToMany(Formation::class, 'listformation_souscategorie','listformation_id','souscategorie_id'); //->withPivot('formation');
    }


    public function souscategories()
    {

        return $this->belongsToMany(Souscategorie::class);  //->withPivot('souscategorie_id');
    }
}
