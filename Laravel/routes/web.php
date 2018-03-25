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

Route::get('/', function () {
    return view('welcome');
});
//Test out css
Route::view('css','practice');

// Pass to the controller
Route::get('/index','MyController@viewIndex');
//Shortcut view
Route::view('/test','welcome');
//
Route::get('/register','MyController@viewRegister');