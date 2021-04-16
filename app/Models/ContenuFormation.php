<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenuFormation extends Model
{
    use HasFactory;

    protected $fillable = [ 'contenu', 'description', 'time_contenu'];


    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }


}
