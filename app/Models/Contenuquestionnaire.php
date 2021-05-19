<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenuquestionnaire extends Model
{
    // use HasFactory;
    protected $table = 'contenuquestionnaires';
    protected $fillable = [ 'questionnaire_id', 'contenuformation_id'];

    public function questionnaires()
    {
        return $this->belongsToMany(Questionnaire::class);
    }

    public function contenuformation()
    {
        return $this->belongsTo(Contenuformation::class);
    }

}
