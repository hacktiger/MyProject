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
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $userName = Input::get('userName');
        $id = Input::get('id');
        if($userName && !$id){
            $user= DB::table('users')->where('name','LIKE','%'.$userName."%")->paginate(8);
        return view('profile.profile-index',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'user'=>$user, 
        ]);
        }elseif (!$userName && $id) {
            $user= DB::table('users')->where('id','=',$id)->paginate(8);
        return view('profile.profile-index',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'user'=>$user, 
        ]);
        } 
        elseif($userName && $id){
            $user = DB::table('users')->where('name','LIKE','%'.$userName."%")->where('id','=',$id)->paginate(8);
        return view('profile.profile-index',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'user'=>$user, 
        ]);
        } else {
            return redirect()->back()->with('error', 'No such User found');
        }
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
    public function gameManageSearch()
    {
        $q = Input::get ( 'title' );
        $gameTitle = games::where('title','LIKE','%'.$q.'%')->paginate(12);
        if(count($gameTitle) > 0)
            return view('admin.game-manage', ['game'=>$gameTitle]);
        else 
            return redirect()->back()->with('error', 'No game found');
    }

}

?>