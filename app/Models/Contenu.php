<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    use HasFactory;

    protected $table = 'contenus';

    protected $fillable = ['details'];

    public function formations()
{
    return $this->belongsToMany(Formation::class);
}

public function souscategories()
{
    return $this->belongsToMany(Souscategorie::class);
}

}
