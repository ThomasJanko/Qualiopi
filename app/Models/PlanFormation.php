<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class planformation extends Model
{
    use HasFactory;

    protected $fillable = ['name','time_formation'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

}


