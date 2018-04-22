<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\games;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report(Request $request){
    	$report_1 = $request->input('report_1');
    	$report_2 = $request->input('report_2');
    	$report_3 = $request->input('report_3');

    	if( $report_1 !== null ){
    		$report_1 = 1;
    	} else { $report_1 = 0; }
    	if( $report_2 !== null ){
    		$report_2 = 1;
    	} else { $report_2 = 0; }
    	if( $report_3 !== null ){
    		$report_3 = 1;
    	} else { $report_3 = 0; }

    	$report_by = auth()->user()->id;
    	$text = $request->input('text');

    	DB::table('report')->insert([
    		'upload_by' => $report_by,
    		'Impropriate' => $report_1,
    		'Fraud'	=> $report_2,
    		'Plagarism' => $report_3,
    		'text' => $text,
    	]);	

    	return redirect('/games')->with('success','Game Reported');
    }	

    public function rating(Request $request, $title){
        // get the rating + current user id 
        $rating = $request->input('rating');
        $rate_by = auth()->user()->id;
        //simplify if statement
        $check = DB::table('rating')->where([
            ['game_title',$title],
            ['user_id', $rate_by]])->get();
        // check if the record already exist
        // if (false)
        //      add new one
        // else (true)
        //      delete old one + add new one
        if(!$check){
            DB::table('rating')->insert([
               'user_id'=> $rate_by,
               'game_title' => $title,
               'rating' => 0,
            ]);
            DB::table('rating')->where(['user_id'=> $rate_by, 'game_title' => $title,])->update([
               'rating' => $rating,
            ]);
        } else {
            // delete old rating
            DB::table('rating')->where([
                ['game_title',$title],
                ['user_id', $rate_by]])->delete();
            // add new
            DB::table('rating')->insert([
               'user_id'=> $rate_by,
               'game_title' => $title,
               'rating' => $rating,
            ]);
        }
        // calculate Avg_rating in GAMES table after rating the same game
        $game = games::orderBy('created_at','DESC')->get();
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
       
        // redirect back 
        return redirect()->back();
    }

    public function favorite(Request $request, $title){
        // get user input
        $favorite = $request->input('favorite');
        // get current user id
        $user_id = auth()->user()->id;
        //simplify if statement
        $check_2 = DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]
        ]);
        // check if exist
        if(!$check_2){
            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'game_title' => $title,
            ]);
        } /** if exist delete from database **/else {
            DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]])->delete();
        }
        // redirect back 
        return redirect()->back();
    }

    
    public function topGames(){
        //get games except first 3 by avg_rating
        $game =  games::orderBy('avg_rating','DESC')->skip(3)->take(7)->get();
        // get top 3 by avg_rating
        $top_1 = games::orderBy('avg_rating','DESC')->take(1)->get();
        $top_2 = games::orderBy('avg_rating','DESC')->skip(1)->take(1)->get();
        $top_3 = games::orderBy('avg_rating','DESC')->skip(2)->take(1)->get();
        // return view
        return view('games.topGames',['game'=>$game,'top_1'=>$top_1, 'top_2'=>$top_2, 'top_3'=>$top_3]);
    }

    public function mostDownload(){
        //SELECT game_title, COUNT(user_id) FROM sales_log GROUP BY game_title
        $game = DB::table('sales_log')->leftJoin('games', 'sales_log.game_title', '=', 'games.title')->select(['sales_log.game_title', 'games.slug',DB::raw(' COUNT(sales_log.user_id) as downloads')])->groupBy(['sales_log.game_title','games.slug'])->orderBy('downloads','DESC')->skip(3)->take(7)->get();
        //get top 3 
        $top_1 = DB::table('sales_log')->leftJoin('games', 'sales_log.game_title', '=', 'games.title')->select(['sales_log.game_title', 'games.slug',DB::raw(' COUNT(sales_log.user_id) as downloads')])->groupBy(['sales_log.game_title','games.slug'])->orderBy('downloads','DESC')->take(1)->get();
        $top_2 = DB::table('sales_log')->leftJoin('games', 'sales_log.game_title', '=', 'games.title')->select(['sales_log.game_title', 'games.slug',DB::raw(' COUNT(sales_log.user_id) as downloads')])->groupBy(['sales_log.game_title','games.slug'])->orderBy('downloads','DESC')->skip(1)->take(1)->get();
        $top_3 = DB::table('sales_log')->leftJoin('games', 'sales_log.game_title', '=', 'games.title')->select(['sales_log.game_title', 'games.slug',DB::raw(' COUNT(sales_log.user_id) as downloads')])->groupBy(['sales_log.game_title','games.slug'])->orderBy('downloads','DESC')->skip(2)->take(1)->get();
        // return view
        return view('games.mostDownload',['game'=>$game,'top_1'=>$top_1, 'top_2'=>$top_2, 'top_3'=>$top_3]);
    }

    public function devList(){
        // get all user auth_level = developer
        $user  = User::where('auth_level', 'Like','developer')->get();
        return view('devList', ['user'=>$user]);
    }

    public function addCash(){
        $current = auth()->user()->wallet;
        $amount = Input::get('Cquery')+ $current;
        $userID = auth()->user()->id;
        if($amount <9999.99){
        $add = DB::table('users')->where('id', 'LIKE', $userID)->update([
            'wallet' =>$amount,
        ]);
        //wallet size limit
        }else{
            $add = DB::table('users')->where('id', 'like', $userID)->update([
                'wallet'=>9999.99,
            ]);
        }

        return redirect()->back()->with('success', 'Cash Added');

    }
    public function purchase( Request $request, $title){
        $purchase = $request->input('purchase');
        $user_id = auth()->user()->id;
        $game= games::find($title);
        $cash = $game->price -$game->sales;
        $wallet = auth()->user()->wallet - $cash;
        
        if($wallet >=0){
            $lastupdated = date('Y-m-d H:i:s');
            DB::table('sales_log')->insert([
                'game_title'=> $title,
                'user_id'=> $user_id,
                'created_at'=> $lastupdated,
                'updated_at'=> $lastupdated
            ]);
            $CashUpdate = DB::table('users')->where('id', 'LIKE', $user_id)->update([
                'wallet' =>$wallet,
            ]);
            return redirect()->back()->with('success', 'Game Purchased');
        }
        else{
            return redirect()->back()->with('error', 'Not Enough Cash');
        }
    }
}
