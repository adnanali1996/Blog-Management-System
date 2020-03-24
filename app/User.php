<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // RELATIONSHIP
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    // USER MAY POST MANY POST SO THE RELATION IS I TO MANY
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}