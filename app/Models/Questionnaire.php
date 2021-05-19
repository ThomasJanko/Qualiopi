<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Questionnaire extends Model
{

    protected $fillable = ['name'];

    public function contenuformations()
    {
        return $this->belongsToMany(Contenuformation::class);
    }


    public function contenuquestionnaires()
    {
        return $this->belongsToMany(Contenuquestionnaire::class);
    }

}


