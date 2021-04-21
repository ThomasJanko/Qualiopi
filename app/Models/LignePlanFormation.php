<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePlanFormation extends Model
//Pivot entre Plan de formation et contenu de formation
{
    protected $fillable = ['planFormation','contenuFormation', 'planFormation_id', 'contenuFormation_id'];


    public function planFormations()
    {
        return $this->belongsToMany(PlanFormation::class);
    }

    public function contenuFormation()
    {
        return $this->belongsToMany(ContenuFormation::class);
    }


}
