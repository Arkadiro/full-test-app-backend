<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getUser(Request $request){
        $users = User::all();
        $id = $request->input('id');
        $user = $users[$id-1];
        return response()->json(['data' => $user]);
    }

    public function getUsers(Request $request){
        $users = User::all();
        return response()->json($users);
    }

    public function updateUser(Request $request) {
        $user = User::find($request->input('user.id'));
        $user->name = $request->input('user.name');
        $user->email = $request->input('user.email');
        $user->save();
        return response()->json($user);
    }
}
