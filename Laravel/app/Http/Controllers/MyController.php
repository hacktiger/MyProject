<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Notifications\GamePaid;
use Carbon\Carbon;
use App\User;
use App\games;
use Exception;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report(Request $request, $title){
        //

    	$report_by = auth()->user()->id;
    	$text = $request->input('text');
        //blank report check
        if (!isset($text)){
            return redirect()->back()->with('error', 'Blank Report');
        }  else{
        	DB::table('report')->insert([
        		'upload_by' => $report_by,
                'text' => $text,
                'game_title' => $title,
        	]);	

            return redirect()->back()->with('success','Game Reported');
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
                ['user_id', $rate_by]
            ])->delete();

            DB::table('rating')->insert([
               'user_id'=> $rate_by,
               'game_title' => $title,
               'rating' => $rating,
           ]);
        }

        // UPDATE avg_rating in games

        // get the avg rating
        $get_avg_rating = DB::table('rating')
            ->where('game_title',$title)
            ->groupBy('game_title')
            ->avg('rating'); 
        // Round the number and update avg_rating in games
        $rating_2 = round( $get_avg_rating, 1, PHP_ROUND_HALF_UP);
        DB::table('games')->where('title', $title)
            ->update([
                'avg_rating'=> $rating_2,
            ]);

       
        // redirect back 
        return redirect()->back()->with('success','Game Rated !');
    }

    public function favorite(Request $request, $title){
        $user_id = auth()->user()->id;
        $check_2 = DB::table('favorites')->where([
            ['game_title',$title],
            ['user_id', $user_id]
        ])->get();
        if(!isset($check_2[0]->game_title)){
            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'game_title' => $title,
            ]);
        } else {
            DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]])->delete();
        }

        return redirect()->back()->with('success','Favorite status changed');
    }

    /**
    *   All games sorting order
    *
    *   @return view('games.allGames',['game'=>$game, 'tags'=>$tags])
    *
    **/
    public function allGames(){
        // page info
        $page_title = "All Games";
        $page_desc = "This is the list of all available games from most recent to oldest";
        // get all games in DESC order of creation
        $game =  games::orderBy('created_at','DESC')->select('title','slug','image','avg_rating','upload_by')->where('approved', 'Y')->paginate(12);
        // get 5 tags
        $display_tags = DB::table('tags')->select('id','name')->take(5)->get();
        //
        $tags = DB::table('tags')->select('id','name')->get();

        // return view resource.views.allGames
        return view('allGames',['game'=>$game, 'display_tags'=>$display_tags, 'tags'=>$tags, 'page_title'=>$page_title, 'page_desc'=>$page_desc]);
    }

    public function topGames(){
        // page info
        $page_title = "Top Games";
        $page_desc = "This is the list of the highest to lowest average rating on the site";
        // Get top rated games
        $game =  games::orderBy('avg_rating','DESC')->select('title','slug','image','avg_rating','upload_by')->where('approved', 'Y')->paginate(12);
        // get 5 tags
        $display_tags = DB::table('tags')->select('id','name')->take(5)->get();
        //
        $tags = DB::table('tags')->select('id','name')->get();

         return view('allGames',['game'=>$game, 'display_tags'=>$display_tags, 'tags'=>$tags, 'page_title'=>$page_title, 'page_desc'=>$page_desc]);
    }

    public function mostDownload(){
        // page info
        $page_title = "Most Purchased";
        $page_desc = "This is the list of games with the most purchases to least";
        //SELECT game_title, COUNT(user_id) FROM sales_log GROUP BY game_title
        $game = DB::table('sales_log')
                ->leftJoin('games', 'sales_log.game_title', '=', 'games.title')
                ->select(['games.title', 'games.slug','games.image', 'avg_rating', 'games.upload_by',DB::raw(' COUNT(sales_log.user_id) as downloads')])
                ->where('approved', 'Y')
                ->groupBy(['games.title','games.slug','games.image', 'avg_rating', 'games.upload_by'])
                ->orderBy('downloads','DESC')
                ->paginate(12);
        // get 5 tags
        $display_tags = DB::table('tags')->select('id','name')->take(5)->get();
        //
        $tags = DB::table('tags')->select('id','name')->get();


        // return view
        return view('allGames',['game'=>$game, 'display_tags'=>$display_tags, 'tags'=>$tags, 'page_title'=>$page_title, 'page_desc'=>$page_desc]);
    }
    // END 


    //
    public function devList(){
        $user  = User::where('auth_level','developer')->get();
        return view('devList', ['user'=>$user]);
    }

    public function addCash(){
        try{
        $current = auth()->user()->wallet;
        $userID = auth()->user()->id;
        $get_input_amount = Input::get('Cquery');
        $mytime = Carbon::now();
        
        //insert amount to wallet
        $amount = $get_input_amount + $current;
        if($amount <9999.99){
        $add = DB::table('users')->where('id', 'LIKE', $userID)
                        ->update([
                            'wallet' =>$amount,
                        ]);
                // Log the amount added to wallet
                DB::table('wallet_history')->insert([
                    'user_id'=> $userID,
                    'amount' => $get_input_amount,
                    'created_at' => $mytime,
                ]);
        //wallet size limit
        }else{
            $add = DB::table('users')->where('id', 'like', $userID)
                        ->update([
                            'wallet'=>9999.99,
                        ]);
                                // Log the amount added to wallet
        DB::table('wallet_history')->insert([
            'user_id'=> $userID,
            'amount' => 9999.99,
            'created_at' => $mytime,
        ]);
        }

        //Return view
        return redirect()->back()->with('success', 'Cash Added');
    }catch(Exception $e){
        return redirect()->back()->with('error', 'Invalid Amount');
    }
    }

    public function purchase( Request $request, $title){
        $user_id = auth()->user()->id;
        $game= games::find($title);
        $cash = $game->price - $game->sales;
        $wallet = auth()->user()->wallet - $cash;
        
        // $admin = User::find($user_id);
        // $admin->notify(new GamePaid($title,$cash));

        if($wallet >=0){
            $lastupdated = date('Y-m-d H:i:s');
            DB::table('sales_log')->insert([
                'game_title'=> $title,
                'user_id'=> $user_id,
                'price'=>$cash,
                'created_at'=> $lastupdated,
                'updated_at'=> $lastupdated
            ]);
            DB::table('users')->where('id',$user_id)->update([
                'wallet' =>$wallet,
            ]);
            return redirect()->back()->with('success', 'Game Purchased');
        }
        else{
            return redirect()->back()->with('error', 'Not Enough Cash');
        }
    }

    
}
