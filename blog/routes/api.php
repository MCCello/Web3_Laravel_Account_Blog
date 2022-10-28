<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api routes for Users
Route::get('user','UserAPI@user');
Route::get('user/{id}','UserAPI@userById');
Route::post('userSave','UserAPI@userSave');
Route::put('userUpdate/{id}', 'UserAPI@userUpdate');
Route::delete('userDelete/{id}','UserAPI@userDelete');


//api routes for Posts
route::get('post','PostsAPI@post'); 
route::get('post/{id}','PostsAPI@postById');
Route::post('postSave','PostsAPI@postSave');
Route::put('postUpdate/{id}', 'PostsAPI@postUpdate');
Route::delete('postDelete/{id}','PostsAPI@postDelete');
