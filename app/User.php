<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the posts for this user.
     *
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the posts of the subbreddit.
     *
     */
    public function userPosts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
