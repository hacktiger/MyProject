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
	return redirect('/login');
});

Route::get('/backHome',function(){
	return redirect('/games');
})->name('main');

Route::get('/admin',['middleware'=>'admin',function(){
  return view('admin.admin');
}])->name('admin');

// Cleaning up links 
Route::get('/top-games','MyController@topGames')->name('top_games');
Route::get('/most-download','MyController@mostDownload')->name('most_download');
Route::get('/developers-list','MyController@devList')->name('dev_list');

/**
  *  edit here
  *
**/


Route::resource('games','GamesController');
Route::resource('tags','TagController');
Route::resource('profile','ProfileController');
//admin routes
Route::get('/admin/manage','AdminController@manageGame')->name('games.manage');
Route::get('/admin/profile','AdminController@manageProfile')->name('profiles.manage');
Route::get('/admin/tags','AdminController@manageTag')->name('tags.manage');
Route::get('/admin/game-reports','AdminController@gameReport')->name('show.report');
Route::delete('/admin/game-reports/{id}', 'AdminController@removeReport');
// Addtional function in show
Route::post('/games/{game}/report','MyController@report')->name('games.report');
Route::post('/games/{game}/rating','MyController@rating')->name('games.rating');
Route::post('/games/{game}/favorite','MyController@favorite')->name('games.favorite');
Route::post('/games/{game}/purchase', 'MyController@purchase')->name('games.purchase');
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

Route::post('/addCash', 'MyController@addCash');


Route::post('/profileSearch', 'SearchController@profileSearch');
Route::post('/tagSearch', 'SearchController@tagSearch');

?>
