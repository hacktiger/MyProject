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
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        return view('admin.game-manage',['game'=>$game]); 
    }
    public function salesLog(){
        $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->orderBy('sales_log.id','DESC')->paginate(12);

        return view('admin.salesLog',['sales_log'=>$sales_log]);
    }
    public function walletHistory(){
        return view('admin.walletHistory');
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
        ->orderBy('report.id', 'ASC')->paginate(12);

        return view('admin.reports', ['reports'=>$reports]);
    }

    public function removeReport($id){
        $report = report::find($id)->delete();
        return redirect()->back()->with('success', 'Report Deleted');
    }

    //TAGS
    public function manageTag(){
    	//
        $tag = Tags::orderBy('created_at','DESC')->paginate(8);
        return view('admin.tag-manage',['tag' => $tag]);
    }


    //PROFILES
    public function manageProfile(){
    	// get users
        $user = User::orderBy('created_at','DESC')->paginate(18);

        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();

        return view('profile.profile-index',['user'=>$user, 'admin'=>$admin]);
    }


}
