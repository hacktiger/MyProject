<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
    //INDEX
    public function index(){
        //NOTIFICATION
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        //----------------------------------------------------------------------------------------//
        //                                                                                        //
        //                                      CHARTS DATA                                       //
        //                                                                                        //
        //----------------------------------------------------------------------------------------//
        //USERS
        $num_casual    =   DB::table('users')->where('auth_level','casual')->count();
        $num_admin     =   DB::table('users')->where('auth_level','admin')->count();
        $num_developer =   DB::table('users')->where('auth_level','developer')->count();
        $num_ban       =   DB::table('users')->where('auth_level','ban')->count();
        return view('admin.admin-index',[
            //USERS NUM
            'num_casual'=>$num_casual,
            'num_admin'=>$num_admin,
            'num_developer'=>$num_developer,
            'num_ban'=>$num_ban,
            // NOTIFICATION
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ]);
    }

    //GAMES
    public function manageGame(){
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();

        DB::table('games')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        $new_game_count = 0;
        // ------ //
        //   MAIN
        // -------//
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        return view('admin.game-manage',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'game'=>$game
        ]); 
    }
    public function salesLog(){
        DB::table('sales_log')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = 0;
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();

        

        // ------ //
        //   MAIN
        // -------//
        $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->orderBy('sales_log.id','DESC')->paginate(12);
        return view('admin.salesLog',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'sales_log'=>$sales_log
        ]);
    }
    public  function showSalesLog($id){

        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //   MAIN
        // -------//
        $log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')
                ->select(['sales_log.id','sales_log.user_id','sales_log.game_title','sales_log.price','sales_log.created_at','sales_log.updated_at','users.email','users.name'])
                ->where('sales_log.id',$id)->first();
        //RETURN VIEW
        return view('admin.show.show-salesLog',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'log'=>$log
        ]);
    }
    public function walletHistory(){
                //
        DB::table('wallet_history')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //   MAIN
        // -------//
        $log = DB::table('wallet_history')->orderBy('id','DESC')->paginate(12);
        return view('admin.walletHistory',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'log'=>$log
        ]);
    }
    //GAMES-report
    public function gameReport(){
                //
        DB::table('report')->where('status','Unread')->update([
            'status' => 'Read',
        ]);
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //   MAIN
        // -------//
        $reports = DB::table('report')->leftJoin('users','report.upload_by','=','users.id')
        ->leftJoin('games','report.game_title','=','games.title')
        ->select(
        'report.id as id','report.reporter as userID',
        'report.Impropriate as Impropriate','report.Fraud as Fraud',
        'report.Plagarism as Plagarism', 'report.text as text',
        'report.title as title',
        'games.slug as slug',
        'users.name as userName')
        ->orderBy('report.id', 'ASC')->paginate(12);

        return view('admin.reports', [
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'reports'=>$reports
        ]);
    }

    public function removeReport($id){
        $report = report::find($id)->delete();
        return redirect()->back()->with('success', 'Report Deleted');
    }

    //TAGS
    public function manageTag(){
        //
        DB::table('tags')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //   MAIN
        // -------//
    	//
        $tag = Tags::orderBy('created_at','DESC')->paginate(8);
        return view('admin.tag-manage',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'tag' => $tag
    ]);
    }


    //PROFILES
    public function manageProfile(){
        //
        DB::table('users')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //   MAIN
        // -------//
    	// get users
        $user = DB::table('users')->where('auth_level','casual')->orderBy('id','DESC')->paginate(20);

        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();

        return view('profile.profile-index',[
            'user'=>$user, 
            'admin'=>$admin,'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ]);
    }
}
