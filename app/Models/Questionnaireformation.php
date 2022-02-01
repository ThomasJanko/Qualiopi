<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaireformation extends Model
{
    use HasFactory;

    // protected $table = 'questionnairesformation';

    protected $fillable = ['formation_id', 'user_id', 'question', 'response', 'userResponse', 'validation'];


    public function formation()
    {
        return $this->belongsTo(Ligneplanformation::class);
    }


    public function user()
    {
        return $this->belongsTo(Ligneplanformation::class);
    }

}
