<?php

namespace App\Models;

use App\Models\User;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Block\Element\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Planformation extends Model

{
    use HasFactory;

     protected $table = 'planformations';

    protected $fillable = ['name_formation','time_formation', 'formation_id', 'user_id'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function ligneplanformations()
    {
        return $this->hasMany(Ligneplanformation::class);
    }
    public function questionnaires()
    {
        // return $this->hasManyThrough(Questionnaire::class, 'ligneplanformations','questionnaires_id', 'planformation_id');
        return $this->belongsToMany(Questionnaire::class, Ligneplanformation::class,'planformation_id','questionnaire_id');
    }

}


