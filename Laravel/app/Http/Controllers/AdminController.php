<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth')->only('showSalesLog');
        $this->middleware('admin')->except('showSalesLog');
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
        //----------------------------------------------------------------------------------------//
        //                                                                                        //
        //                                      CHARTS DATA                                       //
        //                                                                                        //
        //----------------------------------------------------------------------------------------//
        //USERS
        $num_casual    =   User::where('auth_level','casual')->count();
        $num_admin     =   User::where('auth_level','admin')->count();
        $num_developer =   User::where('auth_level','developer')->count();
        $num_ban       =   User::where('auth_level','banned')->count();
        $dt = $this->customGetDate();
        // return view
        return view('admin.admin-index',[
            //USERS NUM
            'num_casual'=>$num_casual,
            'num_admin'=>$num_admin,
            'num_developer'=>$num_developer,
            'num_ban'=>$num_ban,
            'dt'=>$dt,
        ]);
        
    }

    //GAMES
    public function manageGame(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $game =  games::orderBy('created_at','DESC')->paginate(12);
        return view('admin.game-manage',[
            'game'=>$game
        ]); 
    }
    public function salesLog(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $sales_log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')->select(['sales_log.id','sales_log.game_title','users.email'])->orderBy('sales_log.id','DESC')->paginate(12);
        return view('admin.salesLog',[
            'sales_log'=>$sales_log
        ]);
    }
    public  function showSalesLog($id){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $log = DB::table('sales_log')->leftJoin('users','sales_log.user_id','=','users.id')
                ->select(['sales_log.id','sales_log.user_id','sales_log.game_title','sales_log.price','sales_log.created_at','sales_log.updated_at','users.email','users.name'])
                ->where('sales_log.id',$id)->first();
        //RETURN VIEW

        if(Auth::user()->auth_level == 'admin'){
            return view('admin.show.show-salesLog',[
                'log'=>$log,
            ]);
        } else {
            return view('profile.show-log',[
                'log'=>$log,
            ]);
        }
        
    }
    public function walletHistory(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $log = DB::table('wallet_history')->select('id','user_id','amount','created_at')->orderBy('id','DESC')->paginate(12);
        return view('admin.walletHistory',[
            'log'=>$log
        ]);
    }
    //GAMES-report
    public function gameReport(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $reports = DB::table('report')->leftJoin('users','report.upload_by','=','users.id')
        ->leftJoin('games','report.game_title','=','games.title')
        ->select(
        'report.id as id','report.upload_by as userID',
        'report.text as text',
        'report.game_title as title',
        'games.slug as slug',
        'users.name as userName')
        ->orderBy('report.id', 'ASC')->paginate(12);

        return view('admin.reports', [
            'reports'=>$reports
        ]);
    }

    public function removeReport($id){
        $report = report::find($id)->delete();

        return redirect()->back()->with('success', 'Report Deleted');
    }

    //TAGS
    public function manageTag(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
    	//
        $tag = Tags::orderBy('created_at','DESC')->select('id','name')->paginate(8);
        return view('admin.tag-manage',[
            'tag' => $tag
    ]);
    }


    //PROFILES
    public function manageProfile(){
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
    	// get users
        $user = User::where('auth_level','casual')->paginate(30);

        // get admins
        $admin = User::where('auth_level','admin')->paginate(30);
        //
        $dev = User::where('auth_level','developer')->paginate(30);
        return view('admin.profile-manage',[
            'user'=>$user, 
            'admin'=>$admin,
            'dev' =>$dev,
        ]);
    }

}
