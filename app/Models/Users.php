<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // use Notifiable;

    protected $table = 'users';

    protected $fillable = ['email','password', 'name', 'surname', 'client_id', 'role_id'];

    protected $hidden = ['password',  'remember_token'];



    public function role()
    {
         return $this->belongsTo(Role::class);
    }



    public function client() //clients ou client ?
    {
            return $this->belongsTo(Client::class);
    }


    public function formations()
    {
        return $this->hasMany(Formation::class);
    }



}
