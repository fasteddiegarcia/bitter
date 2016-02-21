<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /**
     * Get the posts of the subbreddit.
     *
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the posts of the subbreddit.
     *
     */
    public function postUsers()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
