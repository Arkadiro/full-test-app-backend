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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFollow(Request $request)
    {
        $follow = new Follow;
        $result = $follow->getFollowers($request->input('followModel.user'));
        foreach($result as $followers) {
            if ($followers == $request->input('followModel.follower')) {
                return response()->json(true);
            }
        }
        $follower = Follow::find($request->input('followModel.id'));
        $follow->user = $request->input('followModel.user');
        $follow->follower = $request->input('followModel.follower');
        $follow->save();
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

    public function testFollow(Request $request)
    {
        $follow = new Follow;
        $followers = $follow->getFollowers($request->input('followModel.user'));
        foreach($followers as $follower) {
            if ($follower == $request->input('followModel.follower')) {
                return response()->json(true);
            }
        }
        return response()->json(false);
    }

}
