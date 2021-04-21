<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class Client extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['socialReason', 'email', 'address', 'city', 'country', 'postal' ];
=======

    protected $fillable = ['social_reason', 'email', 'address', 'city', 'country', 'postal' ];
>>>>>>> 0b12e317e392cc03691fcdf9b5688862fdc2898f


    public function users()
    {
        return $this->hasMany(Users::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }



}


