<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use App\rating;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function titleSearch()
    {
        $q = Input::get ( 'q' );
    $gameTitle = games::where('title','LIKE','%'.$q.'%')->get();
    if(count($gameTitle) > 0)
        return view('search.results')->withDetails($gameTitle)->withQuery ( $q );
    else 
        return redirect ('/games')->with('error','No Details found. Try to search again!');
    }

    public function searchPage()
    {
        $games = games::all();
        return view ('search.advance')->withDetails($games);
    }

    public function advancedSearch()
    {
        return redirect('games');
    }
}

?>