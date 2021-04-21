<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    // use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = ['email','password', 'name', 'surname', 'client_id', 'role_id'];

    protected $hidden = ['password',  'remember_token'];

    protected $dates = ['deleted_at'];



    public function role()
    {
         return $this->hasOne(Role::class);
    }



    public function client() //clients ou client ?
    {
            return $this->hasOne(Client::class);
    }


    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }



}
