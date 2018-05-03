<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use Illuminate\Support\Facades\Input;

include('AdminController.php');

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
            return view('search.results', ['gameTitle'=> $gameTitle]);
        else 
            return redirect()->back()->with('error','No Details found. Try to search again!');
    }

    public function searchPage()
    {
        $tags = Tags::all();
        return view ('search.advance', ['tags'=>$tags]);
    }

    public function advancedSearch(Request $request)
    {
        $title = Input::get('title');
        $upload_by = Input::get('upload_by');
        $avg_rating = Input::get('avg_rating');
        // get tagName
        $tagID  = $request->input('tags');
        if(isset($tagID)){
            $tag = DB::table('tags')->where('id', $tagID)->select('name')->get();
            $tagName = $tag[0]->name;
        } else {
            $tagName = 'none';
        }
        
        //check blank numeric value
        if(!isset($avg_rating)){
            $avg_rating = 0;
        }
        //check out of range
        if ($avg_rating >5){
            $avg_rating = 5;
        }

        if($tagName == 'none'){
            $gameTitle = games::leftJoin('games_tags', 'games_tags.games_title', '=', 'title')->leftJoin('tags', 'tags.id', '=', 'games_tags.tags_id')->where([
            ['upload_by','LIKE','%'.$upload_by.'%'], 
            ['title', 'like', '%'.$title.'%'],
            ['avg_rating', ">=",$avg_rating],
            ])->get();
        } else {
            $gameTitle = games::leftJoin('games_tags', 'games_tags.games_title', '=', 'title')->leftJoin('tags', 'tags.id', '=', 'games_tags.tags_id')->where([
            ['upload_by','LIKE','%'.$upload_by.'%'], 
            ['title', 'like', '%'.$title.'%'],
            ['avg_rating', ">=",$avg_rating],
            ['tags.name', $tagName]
            ])->get();
        }
        

        if(count($gameTitle) > 0)
            return view('search.results', ['gameTitle'=> $gameTitle]);
        else 
            return redirect()->back()->with('error','No Details found. Try to search again!');

    }

    public function profileSearch()
    {
        //
        $admin_controller = new AdminController();
        $all_unread = $admin_controller->getNotice();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $userName = Input::get('userName');
        $id = Input::get('id');
        if($userName && !$id){
            $user= DB::table('users')->where('name','LIKE','%'.$userName."%")->paginate(8);
        return view('profile.profile-index',[
            'all_unread'=>$all_unread,
            'user'=>$user, 
        ]);
        }elseif (!$userName && $id) {
            $user= DB::table('users')->where('id','=',$id)->paginate(8);
        return view('profile.profile-index',[
            'all_unread'=>$all_unread,
            'user'=>$user, 
        ]);
        } 
        elseif($userName && $id){
            $user = DB::table('users')->where('name','LIKE','%'.$userName."%")->where('id','=',$id)->paginate(8);
        return view('profile.profile-index',[
            'all_unread'=>$all_unread,
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