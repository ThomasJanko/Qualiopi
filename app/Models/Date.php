<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['dateformation', 'heuredebut', 'heurefin'];

    public function formations()
{
    return $this->belongsToMany(Formation::class);
}


}



