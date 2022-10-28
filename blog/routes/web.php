<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    return view('welcome');
});

Route::get('/contact',function()
{
    return view('contact');
});

Route::get('/profile',function(){
    return view('profile');
});

Route::get('/user', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload','UserController@uploadAvatar');

Route::resource('posts','PostsController');

Route::get('/myposts', 'PostsController@myposts');



Route::get('/excel_export','ExportExcelController@index');

Route::get('/export_excel/excel','ExportExcelController@excel');

Route::get('/watermarkk','UserController@watermarkk');

Route::post('/commentss','CommentController@commentz');

Route::get('/downloadPDF/{id}','PostsController@downloadPDF');

//change password 
Route::get('change-password','ChangePasswordController@index');
Route::post('change-password','ChangePasswordController@store')->name('change.password');