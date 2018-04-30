<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\games;
use App\User;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $notification =  Notification::orderBy('created_at','DESC')->paginate(6);

        //Return view
        return view('admin.notification.noti-index',[
            'notification'=>$notification,
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        //Return view
        return view('admin.notification.noti-create',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        //data validation
        $this->validate($request, [
            'text'=>'required',
            'image'=>'image|nullable|max:5999',
        ]);
        //Handle File Upload
        if($request->hasFile('image')){
            //with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }  else {
            $fileNameToStore = 'khongCoImage.jpg';
        }
        //CREATE INFO
        $noti = new Notification();
        $noti->admin_id = Auth::user()->id;
        $noti->text = $request->input('text');
        $noti->image = $fileNameToStore;

        $noti->save();

        //Return view
        $notification =  Notification::orderBy('created_at','DESC')->paginate(6);
        return view('admin.notification.noti-index',[
            'notification'=>$notification,
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ])->with('success','Notice Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $notification = DB::table('notification')->where('id',$id)->first();

        //RETURN VIEW
        return view('admin.notification.noti-edit',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'notification'=>$notification
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        //data validation
        $this->validate($request, [
            'text'=>'required',
            'image'=>'image|nullable|max:5999',
        ]);
        //Handle File Upload
        if($request->hasFile('image')){
            //with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }  else {
            $fileNameToStore = 'khongCoImage.jpg';
        }
        //CREATE INFO
        $noti = Notification::find($id);
        $noti->admin_id = Auth::user()->id;
        $noti->text = $request->input('text');
        $noti->image = $fileNameToStore;
        $noti->save();

        //Return view
        $notification =  Notification::orderBy('created_at','DESC')->paginate(6);
        return view('admin.notification.noti-index',[
            'notification'=>$notification,
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
        ])->with('success','Notice Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();

        // ---------------------------------------//
        //                  MAIN                  //
        // ---------------------------------------//
        //find it
        $notification = Notification::find($id);
        //delete it
        $notification->delete();
        //
        return redirect('/notification')->with('success','Notice Deleted');
    }
}
