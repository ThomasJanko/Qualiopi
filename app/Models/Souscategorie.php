<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model
{
    use HasFactory;

    protected $table = 'souscategories';

    public $timestamps = false;

    protected $fillable = ['title', 'contenu_id'];

    public function listformations()
    {
        return $this->belongsToMany(Listformation::class); //->pivot with formation
    }

    public function contenus()
    {
        return $this->belongsToMany(Contenu::class); //->pivot with formation
    }

}
