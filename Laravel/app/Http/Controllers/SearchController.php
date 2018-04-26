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
    public function __construct(){
        $this->middleware('auth');
    }

    public function titleSearch()
    {
        $q = Input::get ( 'q' );
        $gameTitle = games::where('title','LIKE','%'.$q.'%')->get();
        if(count($gameTitle) > 0)
            return view('search.results')->withDetails($gameTitle);
        else 
            return redirect()->back()->with('error','No Details found. Try to search again!');
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
        
        //check blank numeric value
        if(!isset($avg_rating)){
            $avg_rating = 0;
        }
        //check out of range
        if ($avg_rating >5){
            $avg_rating = 5;
        }
        $gameTitle = games::where([
            ['upload_by','LIKE','%'.$upload_by.'%'], 
            ['title', 'like', '%'.$title.'%'],
            ['avg_rating', ">=",$avg_rating]
            ])->get();

        if(count($gameTitle) > 0)
            return view('search.results')->withDetails($gameTitle);
        else 
            return redirect()->back()->with('error','No Details found. Try to search again!');
    }

    public function profileSearch()
    {
        $userName = Input::get('userName');
        $id = Input::get('id');
        $user = User::where([
            ['name', 'LIKE', '%'.$userName.'%'],
            ['id', 'LIKE', $id]
        ])->get();
        if (count($user)>0)
            return view('profile.profile-index-search',['user'=>$user]);
        else
            return redirect()->back()->with('error', 'No such User found');
    }

    public function tagSearch()
    {
        $tag = Input::get('tag');
        $result = DB::table('tags')->where([
            ['name', 'LIKE', '%'.$tag.'%']
        ])->get();
        if (count($result)>0){
            return view('tags.index', ['tag'=>$result]);
        }
        else{
            return redirect()->back()->with('error', 'No tags found');
        }
    }

}

?>