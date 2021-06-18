<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;



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

}


