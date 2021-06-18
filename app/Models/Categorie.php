<?php

namespace App\Models;

use App\Models\Souscategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;



    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = ['title'];

    public function listformations()
    {
        return $this->hasMany(Listformation::class); //, 'categories_id'
    }
    public function souscategories()
    {
        return $this->belongsToMany(Souscategorie::class, Listformation::class,'categorie_id','souscategorie_id');
    }
}
