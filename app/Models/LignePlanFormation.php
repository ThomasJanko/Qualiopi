<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligneplanformation extends Model
//Pivot entre Plan de formation et contenu de formation
{
    // protected $table = 'ligneformations';

    protected $fillable = ['planformation_id', 'contenuformation_id'];


    public function planformations()
    {
        return $this->belongsToMany(Planformation::class);
    }

    // public function contenuformations()
    // {
    //     return $this->belongsToMany(Contenuformation::class);
    // }

    public function listformations()
    {
        return $this->hasMany(ListFormation::class);
    }


}
