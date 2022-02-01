<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $table = 'questionnaires';

    protected $fillable = ['listformation_id', 'question', 'choiceA', 'choiceB', 'choiceC', 'choiceD', 'response'];

    public function planformation()
    {
        return $this->belongsTo(Planformation::class);
    }

    public function listformation()
    {
        return $this->belongsTo(Ligneplanformation::class);
    }

    public function ligneplanformations()
    {
        return $this->belongsToMany(Ligneplanformation::class, Listformation::class,'planformation_id','questionnaire_id');
    }



}
