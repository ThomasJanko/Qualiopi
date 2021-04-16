<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['name_formation','date_formation','location_formation','state_formation','user_id', 'client_id', 'planFormation_id', 'information_id'];



    public function users()
    {
        return $this->belongsToMany(Users::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function planFormation()
    {
        return $this->belongsTo(planFormation::class);
    }


    public function Information()
    {
        return $this->belongsTo(Information::class);
    }







}


