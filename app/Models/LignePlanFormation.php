<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligneplanformation extends Model
//Pivot entre Plan de formation et contenu de formation
{
    // protected $table = 'ligneformations';
    // protected $appends = ['planformation_id'];
    protected $fillable = ['planformation_id','Categorie', 'SousCategorie', 'Contenu', 'questionnaire_id', 'listformation_id'];


    public function planformation()
    {
        return $this->belongsTo(Planformation::class, 'ligneformation_id');
    }

    public function listformation()
    {
        return $this->belongsTo(ListFormation::class, 'listformation_id');

    }

    public function questionnaire()
    {
        //return $this->belongsTo(Questionnaire::class, 'questionnaire_id');

        return $this->hasManyThrough(Questionnaire::class, Ligneplanformation::class, 'listformation_id','id','id','questionnaire_id');

    }




}
