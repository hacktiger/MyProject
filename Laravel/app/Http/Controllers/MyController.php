<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'favorite' => $favorite,
            ]);
        } else {
            DB::table('favorites')->where([
                ['game_title',$title],
                ['user_id', $user_id]])->delete();

            DB::table('favorites')->insert([
                'user_id' => $user_id,
                'game_title' => $title,
                'favorite' => $favorite,
            ]);
        }

        return redirect()->back();
    }

    

    public function topGames(){
        $game =  games::orderBy('avg_rating','DESC')->skip(3)->take(7)->get();
        $top_1 = games::orderBy('avg_rating','DESC')->take(1)->get();
        $top_2 = games::orderBy('avg_rating','DESC')->skip(1)->take(1)->get();
        $top_3 = games::orderBy('avg_rating','DESC')->skip(2)->take(1)->get();

        return view('games.topGames',['game'=>$game,'top_1'=>$top_1, 'top_2'=>$top_2, 'top_3'=>$top_3]);
    }

    public function devList(){

        return view('devList');
    }
}
