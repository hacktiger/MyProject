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
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $userName = Input::get('userName');
        $id = Input::get('id');
        if($userName && !$id){
            $user= DB::table('users')->where('name','LIKE','%'.$userName."%")->paginate(8);
            return view('admin.profile-manage',[

                'user'=>$user, 
            ]);
        }elseif (!$userName && $id) {
            $user= DB::table('users')->where('id','=',$id)->paginate(8);
            return view('admin.profile-manage',[

                'user'=>$user, 
            ]);
        } 
        elseif($userName && $id){
            $user = DB::table('users')->where('name','LIKE','%'.$userName."%")->where('id','=',$id)->paginate(8);
            return view('admin.profile-manage',[

                'user'=>$user, 
            ]);
        } else {
            return redirect()->back()->with('error', 'No such User found');
        }
    }

    public function tagSearch()
    {

        /////
        ///// MAIN
        /////
        $input = Input::get('tag');
        $tag = DB::table('tags')->where([
            ['name', 'LIKE', '%'.$input.'%']
        ])->paginate(7);

        if(count($tag) > 0)
            return view('admin.tag-manage', ['tag'=>$tag]);
        else
            return redirect()->back()->with('error','No tag found');


    }
    public function gameManageSearch()
    {

        /////
        ///// MAIN
        /////
        $q = Input::get ( 'title' );
        $gameTitle = games::where('title','LIKE','%'.$q.'%')->paginate(12);
        if(count($gameTitle) > 0)
            return view('admin.game-manage', ['game'=>$gameTitle]);
        else 
            return redirect()->back()->with('error', 'No game found');
    }

    public function salesLogSearch(){


        $title = Input::get('title');
        $email = Input::get('email');

        if(isset($title) && !isset($email)){
            $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->where('sales_log.game_title','LIKE','%'.$title.'%')->paginate(12);

            return view('admin.salesLog', ['sales_log'=>$sales_log])->with('success','Sales Log with '.$title." found !");
        } elseif (isset($email) && !isset($title)) {
            $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->where('users.email','LIKE','%'.$email.'%')->paginate(12);

            return view('admin.salesLog', ['sales_log'=>$sales_log])->with('success','Sales Log with '.$email." found !");
        } elseif (isset($email) && isset($title)){
            $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->where('users.email','LIKE','%'.$email.'%')->where('sales_log.game_title','LIKE','%'.$title.'%')->paginate(12);
            
            return view('admin.salesLog', ['sales_log'=>$sales_log])->with('success','Sales Log with found !');
        } else {
            return redirect('/admin/sales-log')->with('error', 'Please enter something to search');
        }
    }

    public function walletHistorySearch(){
        $name = Input::get('name');

        if(isset($name)){
            $log = DB::table('wallet_history')->leftJoin('users','wallet_history.user_id','=','users.id')->select('wallet_history.id','users.name','wallet_history.amount','wallet_history.created_at')->where('users.name','LIKE','%'.$name.'%')->paginate(12);
            return view('admin.walletHistory',[
                'log'=>$log
            ])->with('success','Wallet history of '.$name.' found');
        }else{
            return redirect('/admin/wallet-history')->with('error','Please enter something');
        }

    }
    public function reportSearch(){
        $title = Input::get('title');

        if(isset($title)){
            $reports = DB::table('report')->leftJoin('users','report.upload_by','=','users.id')
            ->leftJoin('games','report.game_title','=','games.title')
            ->select(
                'report.id as id','report.upload_by as userID',
                'report.text as text',
                'report.game_title as title',
                'games.slug as slug',
                'users.name as userName')
            ->where('report.game_title','LIKE','%'.$title.'%')->paginate(12);

            return view('admin.reports', [
                'reports'=>$reports
            ])->with('Report of '.$title.' found');
        }else{
            return redirect('/admin/game-reports')->with('error','Please enter something');
        }
    }

}

?>