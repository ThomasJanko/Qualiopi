<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';
    public $timestamps = false;

    protected $fillable = ['contenu'];


    public function formations()
    {
        return $this->hasOne(Formation::class); //->pivot with formation
    }

}
