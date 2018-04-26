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

    public function report(Request $request, $title){
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
        //blank report check
        if (!isset($text)){
            $text = '%20';
        }
        if ($text =='%20' &&$report_1==0&&$report_2==0&&$report_3==0){
            return redirect()->back()->with('error', 'Blank Report');
        }
        else{
    	DB::table('report')->insert([
    		'reporter' => $report_by,
    		'Impropriate' => $report_1,
    		'Fraud'	=> $report_2,
    		'Plagarism' => $report_3,
            'text' => $text,
            'title' => $title,
    	]);	

        return redirect('/games')->with('success','Game Reported');
        }
    }	

    public function rating(Request $request, $title){
        // get the rating + user id 
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
               'rating' => $rating,
           ]);
        } else {
            DB::table('rating')->where([
                ['game_title',$title],
                ['user_id', $rate_by]])->delete();

            DB::table('rating')->insert([
               'user_id'=> $rate_by,
               'game_title' => $title,
               'rating' => $rating,
           ]);
        }

        $game = games::orderBy('created_at','DESC')->get();
        foreach ($game as $games) {
            $rating = DB::table('rating')
                        ->where('game_title', $games->title)
                        ->groupBy('game_title')
                        ->avg('rating'); 
            if($rating == null){
                $rating_2 = 0;
                DB::table('games')->where('title', $games->title)
                    ->update([
                        'avg_rating'=> 0,
                    ]);
            } else {
                $rating_2 = round( $rating, 1, PHP_ROUND_HALF_UP);
                DB::table('games')->where('title', $games->title)
                    ->update([
                        'avg_rating'=> $rating_2,
                    ]);
            }
        }  
       
        // redirect back 
        return redirect()->back();
    }

    public function favorite(Request $request, $title){
        $favorite = $request->input('favorite');
        $user_id = auth()->user()->id;
        
        $check_2 = DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]
        ]);
        
        if(!$check_2){
            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'game_title' => $title,
            ]);
        } else {
            DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]])->delete();

            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'game_title' => $title,
            ]);
        }

        return redirect()->back();
    }

    

    public function topGames(){
        $game =  games::orderBy('avg_rating','DESC')->take(10)->get();

        return view('games.topGames',['game'=>$game]);
    }

    public function mostDownload(){
        //SELECT game_title, COUNT(user_id) FROM sales_log GROUP BY game_title
       $game = DB::table('sales_log')
                ->leftJoin('games', 'sales_log.game_title', '=', 'games.title')
                ->select(['sales_log.game_title', 'games.slug','games.image', 'avg_rating', 'games.upload_by',DB::raw(' COUNT(sales_log.user_id) as downloads')])
                ->groupBy(['sales_log.game_title','games.slug','games.image', 'avg_rating', 'games.upload_by'])
                ->orderBy('downloads','DESC')
                ->take(10)->paginate(10);

        // return view
        return view('games.mostDownload',['game'=>$game]);
    }

    public function devList(){
        $user  = User::where('auth_level', 'Like','developer')->get();
        return view('devList', ['user'=>$user]);
    }

    public function addCash(){
        $current = auth()->user()->wallet;
        $amount = Input::get('Cquery')+ $current;
        $userID = auth()->user()->id;
        if($amount <9999.99){
        $add = DB::table('users')->where('id', 'LIKE', $userID)
                        ->update([
                            'wallet' =>$amount,
                        ]);
        //wallet size limit
        }else{
            $add = DB::table('users')->where('id', 'like', $userID)
                        ->update([
                            'wallet'=>9999.99,
                        ]);
        }

        return redirect()->back()->with('success', 'Cash Added');
    }

    public function purchase( Request $request, $title){
        $purchase = $request->input('purchase');
        $user_id = auth()->user()->id;
        $game= games::find($title);
        var_dump($game);
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

    public function manageGame(){
        $game =  games::orderBy('created_at','DESC')->paginate(14);
        return view('games.manage',['game'=>$game]); 
    }
}
