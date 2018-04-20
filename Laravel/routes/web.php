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
use App\games;
use Illuminate\Support\Facades\Input;

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
// game.show with SLUG URL
Route::get('games','GamesController@index')->name('games.index');
Route::post('games','GamesController@store')->name('games.store');
Route::get('games/create','GamesController@create')->name('games.create');
Route::get('games/{slug}','GamesController@show')->name('games.show');
Route::delete('games/{slug}','GamesController@destroy')->name('games.destroy');
Route::put('games/{slug}','GamesController@update')->name('games.update');
Route::get('games/{slug}/edit','GamesController@edit')->name('games.edit');

Route::resource('games','GamesController');
Route::resource('tags','TagController');
Route::resource('cart','CartController');
Route::resource('profile','ProfileController');
//
// Addtional function in show
Route::post('/games/{game}/report','MyController@report')->name('games.report');
Route::post('/games/{game}/rating','MyController@rating')->name('games.rating');
Route::post('/games/{game}/favorite','MyController@favorite')->name('games.favorite');
//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/all-games','GenreController@allGames')->name('all_games');


Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $gameTitle = games::where('title','LIKE','%'.$q.'%')->get();
    if(count($gameTitle) > 0)
        return view('search')->withDetails($gameTitle)->withQuery ( $q );
    else return redirect ('/games')->with('error','No Details found. Try to search again!');
});

Route::get('/cart','HomeController@toCart');

Route::get('/admin',['middleware'=>'admin',function(){
  return view('admin.admin');
}])->name('admin');
?>
