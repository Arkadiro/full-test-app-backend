<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Follow extends Model
{
    // This function allows us to get a list of users following us
public function followers()
{
    return $this->belongsToMany('User', 'followers', 'follower', 'user')->withTimestamps();
}

// Get all users we are following
public function following()
{
    return $this->belongsToMany('User', 'followers', 'user', 'follower')->withTimestamps();
}

public function test()
{
    //return DB::select('select follower from follows where user = 3');

    $records = DB::table('follows')->where('user', 3)->pluck('follower');

    foreach ($records as $record) {
       $subscribers[] = $record;
    }
    return $subscribers;
}

public function getFollowers($user)
{

    $records = DB::table('follows')->where('user', $user)->pluck('follower');

    $subscribers = [];

    foreach ($records as $record) {
       $subscribers[] = $record;
    }

    return $subscribers;
}
}
