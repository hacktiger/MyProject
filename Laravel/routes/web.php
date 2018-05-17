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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
	return view('layouts.index');
});


//backHome ?
Route::get('/backHome',function(){
	return redirect('/games');
})->name('main');


// admin middleware
Route::get('/admin',['middleware'=>'admin',function(){
  return view('admin.admin');
}])->name('admin');




// All games/ top games/most downloads/ dev list
Route::get('/all-games','MyController@allGames')->name('all_games');
Route::get('/top-games','MyController@topGames')->name('top_games');
Route::get('/most-download','MyController@mostDownload')->name('most_download');
Route::get('/developers-list','MyController@devList')->name('dev_list');


// Resources
Route::resource('games','GamesController');
Route::resource('tags','TagController');
Route::resource('profile','ProfileController');
Route::resource('notification','NotificationController');


//ADMIN routes 
Route::get('/admin/index','AdminController@index')->name('admin.index');
Route::get('/admin/game-manage','AdminController@manageGame')->name('games.manage');
Route::get('/admin/sales-log','AdminController@salesLog')->name('admin.sales_log');
Route::get('/sales-log/{id}','AdminController@showSalesLog')->name('admin.show-sales_log');
Route::get('/admin/wallet-history','AdminController@walletHistory')->name('admin.wallet_history');
Route::get('/admin/profile','AdminController@manageProfile')->name('profiles.manage');
Route::get('/admin/tags','AdminController@manageTag')->name('tags.manage');
Route::get('/admin/game-reports','AdminController@gameReport')->name('show.report');
Route::delete('/admin/game-reports/{id}', 'AdminController@removeReport');
Route::get('/admin/notification','AdminController@notify')->name('admin.notify');


// Profile route make Admin
Route::post('/profile/dev/{id}','ProfileController@makeDev')->name('profile.makeDev');
Route::post('/profile/{id}','ProfileController@makeAdmin')->name('profile.make');
Route::post('/profile/{id}/drop','ProfileController@dropAdmin')->name('profile.drop');


// Addtional function in show
Route::post('/games/{game}/report','MyController@report')->name('games.report');
Route::post('/games/{game}/rating','MyController@rating')->name('games.rating');
Route::post('/games/{game}/favorite','MyController@favorite')->name('games.favorite');
Route::post('/games/{game}/purchase', 'MyController@purchase')->name('games.purchase');

// Wallet - Cash functions
Route::post('/addCash', 'MyController@addCash');
Route::get('/profile/{id}/wallet','ProfileController@wallet')->name('profile.wallet');
Route::get('/my-purchase-history','ProfileController@purchaseHistory')->name('profile.purchase_history');
Route::get('/my-wallet-history','ProfileController@walletHistory')->name('profile.wallet_history');
// Auth
Auth::routes();


// Search Functions
Route::post('/search','SearchController@titleSearch');
Route::get('/search/advance', 'SearchController@searchPage');
Route::post('/search/advancedResults', 'SearchController@advancedSearch');


//Admin Search funcs
Route::post('/profileSearch', 'SearchController@profileSearch');
Route::post('/tagSearch', 'SearchController@tagSearch');
Route::post('/gameManageSearch', 'SearchController@gameManageSearch');
Route::post('/admin/game-manage', 'GamesController@approve');
Route::post('/sales-log-search', 'SearchController@salesLogSearch');
Route::post('/wallet-history-search', 'SearchController@walletHistorySearch');
Route::post('/game-reports-search', 'SearchController@reportSearch');
?>
