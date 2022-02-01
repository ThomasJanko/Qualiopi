<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Client;
use App\Models\Formation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['email','password', 'name', 'surname', 'client_id', 'role_id'];

    protected $hidden = ['password',  'remember_token'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',

    ];


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

        return $this->belongsToMany(Formation::class); //->withPivot('formation');
    }

    public function user()
    {
        return $this->hasOne(user::class);
    }
}

