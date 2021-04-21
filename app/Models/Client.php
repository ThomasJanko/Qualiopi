<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['socialReason', 'email', 'address', 'city', 'country', 'postal' ];


    public function users()
    {
        return $this->hasMany(Users::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }



}


