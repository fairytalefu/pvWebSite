<?php

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

Route::get('/', function (){
    return view('welcome');
});
Route::get('/getmsg','PVController@index');
Route::any('/postData','PVController@post');
//Route::get('/postData','PVController@getData');
Route::get('/showPV',function ()
{
    return view('pvshow.bishe');
});