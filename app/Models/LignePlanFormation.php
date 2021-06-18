<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligneplanformation extends Model
//Pivot entre Plan de formation et contenu de formation
{
    // protected $table = 'ligneformations';
    // protected $appends = ['planformation_id'];
    protected $fillable = ['planformation_id','Categorie', 'SousCategorie', 'Contenu'];


    public function planformation()
    {
        return $this->belongsTo(Planformation::class, 'ligneformation_id');
    }

    // public function contenuformations()
    // {
    //     return $this->belongsToMany(Contenuformation::class);
    // }

    public function listformations()
    {
        return $this->belongsToMany(ListFormation::class);
    }

}
