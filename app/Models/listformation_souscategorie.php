<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class listformation_souscategorie extends Pivot
{
    use HasFactory;
    protected $table = 'listformation_souscategorie';
    public function listformations()
    {
        return $this->hasMany(ListFormations::class,'id','listformation_id','souscategorie_id');
    }
}





