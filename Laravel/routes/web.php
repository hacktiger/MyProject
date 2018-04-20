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

Route::get('/games/tags/create',function(){
	return redirect('/tags/create');
});

Route::get('/tags/games/create',function(){
	return redirect('/games/create');
});
// Cleaning up links 
Route::get('/top-games','MyController@topGames')->name('top_games');
Route::get('/developers-list','MyController@devList')->name('dev_list');

/**
  *  edit here
  *
**/


Route::resource('games','GamesController');
Route::resource('tags','TagController');
Route::resource('profile','ProfileController');
//
// Addtional function in show
Route::post('/games/{game}/report','MyController@report')->name('games.report');
Route::post('/games/{game}/rating','MyController@rating')->name('games.rating');
Route::post('/games/{game}/favorite','MyController@favorite')->name('games.favorite');
// Profile route make Admin
Route::post('/profile/{id}','ProfileController@makeAdmin')->name('profile.make');
Route::post('/profile/{id}/drop','ProfileController@dropAdmin')->name('profile.drop');
//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/all-games','GenreController@allGames')->name('all_games');

Route::post('/search','SearchController@titleSearch');
Route::get('/search/advance', 'SearchController@searchPage');
Route::post('/search/advancedResults', 'SearchController@advancedSearch');
Route::get('/admin',['middleware'=>'admin',function(){
  return view('admin.admin');
}])->name('admin');
?>
