<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use League\CommonMark\Block\Element\Document;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['nameFormation','dateFormation','locationFormation','stateFormation','user_id', 'client_id', 'planFormation_id', 'information_id'];



    public function users()
    {
        //TODO:Vérifier le bon fonctionnement
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


