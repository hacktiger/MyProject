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

Route::get('/games/games/create',function(){
	return redirect('/games/create');
});

Route::get('/profile',function(){
	return view('inc.profile');
})->name('profile');




/**
  *  edit here
  *
**/



// Pass to the controller
//Route::get('/index','MyController@viewIndex');
//Shortcut view


//Route::get('/register','MyController@viewRegister');



Route::resource('games','GamesController');
Route::resource('tags','TagController');

Route::get('/register',function(){
	return view('layouts.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/games/{game}/report','GamesController@report')->name('games.report');
?>
