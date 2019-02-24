<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'CORS'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::post('user', 'UsersController@getUser');
    Route::post('users', 'UsersController@getUsers');
    Route::put('update/user', 'UsersController@updateUser');

    Route::post('jokes', 'ContentController@getJokes');
    Route::post('addjoke', 'ContentController@addJoke');
    Route::post('user/jokes', 'ContentController@getUserJokes');

    Route::post('follow', 'FollowController@addFollow');
    Route::post('isfollow', 'FollowController@showFollow');
    Route::post('unfollow', 'FollowController@deleteFollow');

    Route::post('testfollow', 'FollowController@testFollow');

});
