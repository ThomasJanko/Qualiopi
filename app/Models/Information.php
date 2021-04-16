<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;


    protected $fillable = ['name'];


    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

}
