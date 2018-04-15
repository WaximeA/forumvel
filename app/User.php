<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the categories for user.
     */
    public function categories()
    {
        return $this->hasMany('App\Categories');
    }

    /**
     * Get the topics for user.
     */
    public function topics()
    {
        return $this->hasMany('App\Topics');
    }

    /**
     * Get the comments for user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
