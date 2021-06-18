<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class formation_user extends Pivot
{
    use HasFactory;

    public function formations()
    {
        return $this->hasMany(Formation::class,'id','formation_id', 'user_id');
    }
}
