<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

<<<<<<< HEAD
class PlanFormation extends Model
//Le contenu du plan de formation sélétionné pour la formation.
//Il est rattaché à Ligne de Formation pour avoir son sensemble.
=======
class planformation extends Model
>>>>>>> 0b12e317e392cc03691fcdf9b5688862fdc2898f
{
    use HasFactory;

    protected $fillable = ['name','timeFormation'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

}


