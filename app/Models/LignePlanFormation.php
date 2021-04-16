<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePlanFormation extends Model
{
    protected $fillable = ['plan_formation','contenu_formation'];


    public function planFormations()
    {
        return $this->belongsToMany(PlanFormation::class);
    }

    public function contenuFormation()
    {
        return $this->belongsToMany(ContenuFormation::class);
    }


}
