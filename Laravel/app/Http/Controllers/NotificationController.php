<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notification;



class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        $notification =  Notification::orderBy('created_at','DESC')->select('id','title')->paginate(12);

        //Return view
        return view('admin.notification.noti-index',[
            'notification'=>$notification,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // --------------------------------------------------------------------------------//
        //                                      MAIN                                       //
        // --------------------------------------------------------------------------------//
        //Return view
        return view('admin.notification.noti-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        //data validation
        $this->validate($request, [
            'text'=>'required',
            'title'=>'required|max:255',
        ]);
        //CREATE INFO
        $noti = new Notification();
        $noti->admin_id = Auth::user()->id;
        $noti->title = Input::get('title');
        $noti->text = Input::get('text');
        $noti->save();

        //Return view
        return redirect('/notification')->with('success','Notification Created');
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
        $notification = Notification::find($id);

        if(Auth::user()->auth_level == 'admin'){
            return view('admin.notification.noti-show',['notification'=>$notification]);
        } else {
            return view('show-notification',['notification'=>$notification]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $notification = Notification::find($id);

        //RETURN VIEW
        return view('admin.notification.noti-edit',[
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
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        $this->validate($request, [
            'text'=>'required',
            'title'=>'required|max:255',
        ]);
        //CREATE INFO
        $noti = Notification::find($id);
        $noti->admin_id = Auth::user()->id;
        $noti->title = Input::get('title');
        $noti->text = Input::get('text');
        $noti->save();

        //Return view
        return redirect('/notification')->with('success','Notice Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
