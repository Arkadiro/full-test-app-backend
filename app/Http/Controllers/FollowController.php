<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFollow(Request $request)
    {
        $value = 'false';
        $follows = Follow::all();
        foreach ($follows as $follow) {
            if (($follow->user == $request->input('followModel.user')) && ($follow->follower == $request->input('followModel.follower'))) {
                return $value = 'true';
            }
        }

        return response()->json($value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFollow(Request $request)
    {
        $exist = 'false';
        $follow = new Follow;
        $follows = Follow::all();
        foreach ($follows as $follow) {
            if (($follow->user == $request->input('followModel.user')) && ($follow->follower == $request->input('followModel.follower'))) {
                return $exist = 'true';
            }
        }

        if($exist == 'false'){
            $follower = Follow::find($request->input('follower.id'));
            $follow->user = $request->input('followModel.user');
            $follow->follower = $request->input('followModel.follower');
            $follow->save();
        }

        return response()->json($follow);
    }

    public function deleteFollow(Request $request)
    {
        $follows = Follow::all();
        foreach ($follows as $follow) {
            if (($follow->user == $request->input('followModel.user')) && ($follow->follower == $request->input('followModel.follower'))) {
                $follow->delete();
            }
        }
        $message = 'success';
        return response()->json($message);
    }

}
