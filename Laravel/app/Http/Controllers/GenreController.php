<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;


class GenreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allGames(){
    	// get all games in DESC order of creation
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        // get all possible tags
        $tags = DB::table('tags')->orderBy('created_at','DESC')->get();
        // return view resource.views.allGames
        return view('allGames',['game'=>$game, 'tags'=>$tags]);
    }
}
