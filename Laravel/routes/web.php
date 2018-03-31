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

/** 
 **
 **	Finished routes
 **
**/

Route::get('/', function(){
	return redirect('/home');
});

Route::get('/backHome',function(){
	return redirect('/games');
});

Route::get('/profile',function(){
	return view('inc.profile');
})->name('profile');
/**
  *  edit here
  *
**/

//Home page
// Route::view('/','home');


Route::get('/games/create',function(){
	return view('layouts.register');
});

//Test out css
Route::view('css','practice');

// Pass to the controller
//Route::get('/index','MyController@viewIndex');
//Shortcut view

//
//Route::get('/register','MyController@viewRegister');
//
Route::view('a','layouts.common.navigation');

Route::resource('games','GamesController');

Route::get('/register',function(){
	return view('layouts.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

?>
