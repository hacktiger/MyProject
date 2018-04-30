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

// Resources
Route::resource('games','GamesController');
Route::resource('tags','TagController');
Route::resource('profile','ProfileController');
Route::resource('notification','NotificationController');
// End Resources

//ADMIN routes 
Route::get('/admin/index','AdminController@index')->name('admin.index');
Route::get('/admin/game-manage','AdminController@manageGame')->name('games.manage');
Route::get('/admin/sales-log','AdminController@salesLog')->name('admin.sales_log');
Route::get('/admin/sales-log/{id}','AdminController@showSalesLog')->name('admin.show-sales_log');
Route::get('/admin/wallet-history','AdminController@walletHistory')->name('admin.wallet_history');
Route::get('/admin/profile','AdminController@manageProfile')->name('profiles.manage');
Route::get('/admin/tags','AdminController@manageTag')->name('tags.manage');
Route::get('/admin/game-reports','AdminController@gameReport')->name('show.report');
Route::delete('/admin/game-reports/{id}', 'AdminController@removeReport');
Route::get('/admin/notification','AdminController@notify')->name('admin.notify');
// Profile route make Admin
Route::post('/profile/{id}','ProfileController@makeAdmin')->name('profile.make');
Route::post('/profile/{id}/drop','ProfileController@dropAdmin')->name('profile.drop');
//END ADMIN routes
Route::get('/profile/{id}/wallet','ProfileController@wallet')->name('profile.wallet');


// Addtional function in show
Route::post('/games/{game}/report','MyController@report')->name('games.report');
Route::post('/games/{game}/rating','MyController@rating')->name('games.rating');
Route::post('/games/{game}/favorite','MyController@favorite')->name('games.favorite');
Route::post('/games/{game}/purchase', 'MyController@purchase')->name('games.purchase');

//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/all-games','GenreController@allGames')->name('all_games');
Route::post('/addCash', 'MyController@addCash');

Route::post('/search','SearchController@titleSearch');
Route::get('/search/advance', 'SearchController@searchPage');
Route::post('/search/advancedResults', 'SearchController@advancedSearch');

Route::post('/profileSearch', 'SearchController@profileSearch');
Route::post('/tagSearch', 'SearchController@tagSearch');
Route::post('/gameManageSearch', 'SearchController@gameManageSearch');

//TESTS
Route::get('/test',function(){
	return view('layouts.common.master-test');
});
?>
