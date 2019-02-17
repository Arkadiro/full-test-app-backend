<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // This function allows us to get a list of users following us
public function followers()
{
    return $this->belongsToMany('User', 'followers', 'follow_id', 'user_id')->withTimestamps();
}

// Get all users we are following
public function following()
{
    return $this->belongsToMany('User', 'followers', 'user_id', 'follow_id')->withTimestamps();
}
}
