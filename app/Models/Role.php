<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //use HasFactory;

    protected $fillable = ['role_id'];


    public function users()

    {
        return $this->belongsTo(Users::class);
    }



}
