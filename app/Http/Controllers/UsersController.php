<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getUsers(Request $request){
        $users = User::all();
        $id = $request->input('id');
        $user = $users[$id-1];
        return response()->json(['data' => $user]);
    }
}
