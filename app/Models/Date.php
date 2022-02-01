<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dateid', 'start', 'end', 'location', 'formation_id'];

    public function formations()
{
    return $this->belongsTo(Formation::class);
}


}



