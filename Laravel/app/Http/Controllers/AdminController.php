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
    /**
    *   return #unread -> array -> lessen code
    *
    *   @return array;
    **/
    public function getNotice(){
        $notice = array();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();  
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        array_push($notice, $new_game_count);
        array_push($notice, $new_sales_log_count);
        array_push($notice, $new_wallet_count);
        array_push($notice, $new_game_report_count);
        array_push($notice, $new_tag_count);
        array_push($notice, $new_profile_count);
        // RETURN ARRAY of No of unread
        return $notice;
    }
    /**
    *   return dates and that alike
    *
    *   @return array
    **/
    public function customGetDate(){
        $date = array();
        array_push($date, $date_0 = Carbon::now());
        array_push($date, $date_1 = Carbon::now()->subDay(1));
        array_push($date,$date_2 = Carbon::now()->subDay(2));
        array_push($date,$date_3 = Carbon::now()->subDay(3));
        array_push($date,$date_4 = Carbon::now()->subDay(4));
        array_push($date,$date_5 = Carbon::now()->subDay(5));
        array_push($date,$date_6 = Carbon::now()->subDay(6));
        array_push($date,$date_6 = Carbon::now()->subDay(7));

        $dt = array();
        $dt_0 = DB::table('sales_log')->where('created_at','<',$date[0])->where('created_at','>',$date[1])->sum('price');
        $dt_1 = DB::table('sales_log')->where('created_at','<',$date[1])->where('created_at','>',$date[2])->sum('price');
        $dt_2 = DB::table('sales_log')->where('created_at','<',$date[2])->where('created_at','>',$date[3])->sum('price');
        $dt_3 = DB::table('sales_log')->where('created_at','<',$date[3])->where('created_at','>',$date[4])->sum('price');
        $dt_4 = DB::table('sales_log')->where('created_at','<',$date[4])->where('created_at','>',$date[5])->sum('price');
        $dt_5 = DB::table('sales_log')->where('created_at','<',$date[5])->where('created_at','>',$date[6])->sum('price');
        $dt_6 = DB::table('sales_log')->where('created_at','<',$date[6])->where('created_at','>',$date[7])->sum('price');
        array_push($dt,$dt_0);
        array_push($dt,$dt_1);
        array_push($dt,$dt_2);
        array_push($dt,$dt_3);
        array_push($dt,$dt_4);
        array_push($dt,$dt_5);
        array_push($dt,$dt_6);

        return $dt;
    }
    //INDEX
    public function index(){
        //NOTIFICATION
        $all_unread = $this->getNotice();
        //----------------------------------------------------------------------------------------//
        //                                                                                        //
        //                                      CHARTS DATA                                       //
        //                                                                                        //
        //----------------------------------------------------------------------------------------//
        //USERS
        $num_casual    =   DB::table('users')->where('auth_level','casual')->count();
        $num_admin     =   DB::table('users')->where('auth_level','admin')->count();
        $num_developer =   DB::table('users')->where('auth_level','developer')->count();
        $num_ban       =   DB::table('users')->where('auth_level','banned')->count();
 
        $dt = $this->customGetDate();
        return view('admin.admin-index',[
            //USERS NUM
            'num_casual'=>$num_casual,
            'num_admin'=>$num_admin,
            'num_developer'=>$num_developer,
            'num_ban'=>$num_ban,
            // NOTIFICATION
            'all_unread'=>$all_unread,
            'dt'=>$dt,
        ]);
        
    }

    //GAMES
    public function manageGame(){
        // all unread games->read
        DB::table('games')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // ------ //
        //   MAIN
        // -------//
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        return view('admin.game-manage',[
            'all_unread'=>$all_unread,
            'game'=>$game
        ]); 
    }
    public function salesLog(){
        // all unread sales_log ->read
        DB::table('sales_log')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //get all unread -> for admin
        $all_unread = $this->getNotice();

        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->orderBy('sales_log.id','DESC')->paginate(12);
        return view('admin.salesLog',[
            'all_unread'=>$all_unread,
            'sales_log'=>$sales_log
        ]);
    }
    public  function showSalesLog($id){

        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')
                ->select(['sales_log.id','sales_log.user_id','sales_log.game_title','sales_log.price','sales_log.created_at','sales_log.updated_at','users.email','users.name'])
                ->where('sales_log.id',$id)->first();
        //RETURN VIEW
        return view('admin.show.show-salesLog',[
            'all_unread'=>$all_unread,
            'log'=>$log
        ]);
    }
    public function walletHistory(){
        //
        DB::table('wallet_history')->where('status','Unread')->update([
            'status' => 'Read',
            'updated_at' => Carbon::now(),
        ]);
        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $log = DB::table('wallet_history')->orderBy('id','DESC')->paginate(12);
        return view('admin.walletHistory',[
            'all_unread'=>$all_unread,
            'log'=>$log
        ]);
    }
    //GAMES-report
    public function gameReport(){
                //
        DB::table('report')->where('status','Unread')->update([
            'status' => 'Read',
        ]);
        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $reports = DB::table('report')->leftJoin('users','report.upload_by','=','users.id')
        ->leftJoin('games','report.game_title','=','games.title')
        ->select(
        'report.id as id','report.upload_by as userID',
        'report.Impropriate as Impropriate','report.Fraud as Fraud',
        'report.Plagarism as Plagarism', 'report.text as text',
        'report.game_title as title',
        'games.slug as slug',
        'users.name as userName')
        ->orderBy('report.id', 'ASC')->paginate(12);

        return view('admin.reports', [
            'all_unread'=>$all_unread,
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
        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
    	//
        $tag = Tags::orderBy('created_at','DESC')->paginate(8);
        return view('admin.tag-manage',[
            'all_unread'=>$all_unread,
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
        //get all unread -> for admin
        $all_unread = $this->getNotice();
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
    	// get users
        $user = DB::table('users')->where('auth_level','casual')->orderBy('id','DESC')->paginate(20);

        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();

        return view('profile.profile-index',[
            'user'=>$user, 
            'admin'=>$admin,
            'all_unread'=>$all_unread,
        ]);
    }

}
