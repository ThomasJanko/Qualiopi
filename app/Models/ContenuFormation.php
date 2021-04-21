<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContenuFormation extends Model
// Reprends l'ensemble des élements possible dans un plan de  formation
{
    use HasFactory;

    protected $fillable = [ 'contenu', 'description', 'time_contenu'];


    public function questionnaire()
    {//TODO : hasMany
        return $this->belongsTo(Questionnaire::class);
    }
//TODO : Relation avec Ligne Plan de formation

}
