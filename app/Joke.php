<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Joke extends Model
{
    public function getJokes($user) {
        $posts = DB::table('jokes')->where('user_id', $user)->orderByRaw('created_at DESC')->get();
        $sortedPosts = [];
        $x = 0;
        if( sizeof($posts) <=2){
            return $posts;
        }

        while($x <=2){
            array_push($sortedPosts, $posts[$x]);
            $x++;
        }

        return $sortedPosts;
    }
}
