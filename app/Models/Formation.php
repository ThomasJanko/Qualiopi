<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Block\Element\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formations';

    protected $fillable = ['name_formation','location_formation','state_formation','user_id','client_id','planformation_id','information_id'];



    public function users()
    {

        return $this->belongsToMany(User::class,'formation_user','formation_id','user_id');
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function planformation()
    {
        return $this->belongsTo(Planformation::class);
    }

    public function informations()
    {
        return $this->belongsTo(Information::class,'information_id');
    }


    public function dates()
    {

        return $this->belongsToMany(Date::class);
    }









}


