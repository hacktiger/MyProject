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
        return view ('search.advance');
    }

    public function advancedSearch()
    {
        $title = Input::get('title');
        $upload_by = Input::get('upload_by');
        $avg_rating = Input::get('avg_rating');
        if(!isset($avg_rating)){
            $avg_rating = 0;
        }
        $gameTitle = games::where([
            ['upload_by','LIKE','%'.$upload_by.'%'], 
            ['title', 'like', '%'.$title.'%'],
            ['avg_rating', ">=",$avg_rating]
            ])->get();

        if(count($gameTitle) > 0)
            return view('search.aResults')->withDetails($gameTitle);
        else 
            return redirect ('/games')->with('error','No Details found. Try to search again!');
    }

}

?>