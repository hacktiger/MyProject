<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;

class GenreController extends Controller
{
    //

    public function allGames(){
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        foreach ($game as $games) {
        	$rating = DB::table('rating')->where('game_title', $games->title)->groupBy('game_title')->avg('rating');       
        	if($rating == null){
        		$rating_2 = 0;
                DB::table('games')->where('title', $games->title)->update([
                    'avg_rating'=> 0,
                ]);
        	} else {
        		$rating_2 = round( $rating, 1, PHP_ROUND_HALF_UP);
                DB::table('games')->where('title', $games->title)->update([
                    'avg_rating'=> $rating_2,
                ]);
        	}
        }    
        return view('allGames',['game'=>$game]);
    }
}
