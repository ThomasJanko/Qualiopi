<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Questionnaire extends Model
{

    protected $fillable = ['name'];

    public function contenuFormation()
    {
        return $this->hasOne(ContenuFormation::class);
    }

}


