<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Listformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Souscategorie extends Model
{
    use HasFactory;

    protected $table = 'souscategories';

    public $timestamps = false;

    protected $fillable = ['title'];

    public function listformations()
    {
        return $this->hasMany(Listformation::class); //, 'souscategories_id'
    }
    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, Listformation::class, 'souscategorie_id', 'categorie_id');

    }
}
    // public function contenus()
    // {
    //     return $this->belongsToMany(Listformation::class);
    // }


