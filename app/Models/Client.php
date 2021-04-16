<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['social_reason', 'email', 'address', 'city', 'country', 'postal' ];


    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }



}


