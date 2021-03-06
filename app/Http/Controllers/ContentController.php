<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;

class ContentController extends Controller
{
    public function getJoke(Request $request){
        $users = User::all();
        $id = $request->input('id');
        $user = $users[$id-1];
        return response()->json(['data' => $user]);
    }

    public function getUserJokes(Request $request){
        $joke = new Joke;
        // return $request->input('id');
        $jokes = $joke->getJokes($request->input('id'));
        return response()->json($jokes);
    }

    public function getJokes(Request $request){
        $jokes = Joke::all();
        return response()->json($jokes);
    }

    public function addJoke(Request $request){
        $joke = new Joke;
        $joke->title = $request->input('title');
        $joke->body = $request->input('body');
        $joke->author = $request->input('author');
        $joke->user_id = $request->input('id');

       $joke->save();

       return  response()->json($joke);
    }
}
