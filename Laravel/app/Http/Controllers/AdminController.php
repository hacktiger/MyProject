<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\report;

class AdminController extends Controller
{
    //
    /**
    * Enforce middleware.
    */
    public function __construct()
    {
        $this->middleware('admin');
    }

    //GAMES
    public function manageGame(){
        $game =  games::orderBy('created_at','DESC')->paginate(14);
        return view('games.manage',['game'=>$game]); 
    }
    //GAMES-report
    public function gameReport(){
        $reports = DB::table('report')->leftJoin('users','report.reporter','=','users.id')
        ->leftJoin('games','report.title','=','games.title')
        ->select(
        'report.id as id','report.reporter as userID',
        'report.Impropriate as Impropriate','report.Fraud as Fraud',
        'report.Plagarism as Plagarism', 'report.text as text',
        'report.title as title',
        'games.slug as slug',
        'users.name as userName')
        ->orderBy('report.id', 'ASC')->paginate(10);

        return view('admin.reports', ['reports'=>$reports]);
    }

    public function removeReport($id){
        $report = report::find($id)->delete();
        return redirect()->back()->with('success', 'Report Deleted');
    }

    //TAGS
    public function manageTag(){
    	//
        $tag = Tags::all();
        return view('tags.index',['tag' => $tag]);
    }


    //PROFILES
    public function manageProfile(){
    	// get users
        $user = User::orderBy('created_at','DESC')->paginate(20);

        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();


        return view('profile.profile-index',['user'=>$user, 'admin'=>$admin]);
    }
}
