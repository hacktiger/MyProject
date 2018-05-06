<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\games;
use App\User;
use App\sales_log;

include('AdminController.php');


class ProfileController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->only( ['show','edit','update','walletHistory','purchaseHistory']);
        $this->middleware('admin')->only(['makeAdmin','dropAdmin','destroy','index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get users
        $user = User::orderBy('created_at','DESC')->paginate(20);

        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();


        return view('profile.profile-index',['user'=>$user, 'admin'=>$admin]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (User::where('id', $id)->exists()){ // check if user exists
        //get user
        $user = User::find($id);
        //
        $favorited = DB::table('favorites')->leftJoin('games','favorites.game_title','=','games.title')->where('favorites.user_id',$id)->select(['favorites.game_title', 'games.slug','games.avg_rating', 'games.upload_by','games.image'])->paginate(12);
        // get owned games
        $owned_games = DB::table('sales_log')
            ->leftJoin('users', 'sales_log.user_id','=','users.id')
            ->join('games','sales_log.game_title','=','games.title')
            ->select(['sales_log.game_title', 'games.slug','games.avg_rating', 'games.upload_by','games.image'])
            ->where('sales_log.user_id', $id)
            ->paginate(12);

            if(Auth::user()->auth_level == 'admin'){
                $admin_controller = new AdminController();
                $all_unread = $admin_controller->getNotice();

                return view('admin.show.show-profile',['all_unread'=>$all_unread, 'user'=>$user,'owned_games'=>$owned_games,'favorited'=>$favorited]);
            } else {
                return view('profile.show-profile', ['user'=>$user, 'owned_games'=>$owned_games,'favorited'=>$favorited]); 
            }
        
        }
        else{
            return redirect()->back()->with('error', 'User Does not Exist');
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
        //
        $user = User::find($id);
        return view('profile.edit-profile',['user'=>$user]);
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
        //data validation
        $this->validate($request,[
            'name'=> 'required',
            'description'=> 'nullable',
            'avatar'=> 'image|nullable|max:5999'
        ]);

        
        //handle file upload
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            //delete old one
            //with extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //get file name only
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }
        //create user info
        $profile = User::find($id);
        //change upload_by in 'games'
        if ($profile->auth_level =='developer'){
            games::where('upload_by', 'LIKE', $profile->name)
            ->update(['upload_by'=>$request->input('name')]);
        }
        $profile->name = $request->input('name');
        $profile->description =$request->input('description');
        if ($request->hasFile('avatar')){
            $profile->avatar = $fileNameToStore;
        }
        $profile->save();

        return redirect('/games')->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_controller = new AdminController();
        $all_unread = $admin_controller->getNotice();
         // get users
        $user = User::orderBy('created_at','DESC')->paginate(20);
        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        //find it
        User::where('id', '=', $id)->update([
            'auth_level'=>'banned'
        ]);
        //remove games
        sales_log::where('user_id', '=', $id)->delete();
        // Session flash
        return view('profile.profile-index',[
            'all_unread'=>$all_unread,
            'user'=>$user, 
            'admin'=>$admin,
        ])->with('success','User Banned');
    }

    public function makeAdmin($id){
        //
        $admin_controller = new AdminController();
        $all_unread = $admin_controller->getNotice();
        // get users
        $user = User::orderBy('created_at','DESC')->paginate(20);
        // get admins
        $admin = DB::table('users')->where('auth_level','admin')->orderBy('id','DESC')->get();
        // -------------------------------------------------------------------------------//
        // ------------------------------   MAIN        ----------------------------------//
        // -------------------------------------------------------------------------------//
        DB::table('users')->where('id',$id)->update([
            'auth_level' => 'admin',
        ]);
        // notification

        return view('profile.profile-index',[
            'all_unread'=>$all_unread,
            'user'=>$user, 
            'admin'=>$admin,
        ]);
    }

    public function dropAdmin($id){
        //
        DB::table('users')->where('id',$id)->update([
            'auth_level' => 'casual',
        ]);

        return redirect('/profile');
    }

    /**
    *
    *   WALLET FUNCTIONS
    *
    **/
    public function wallet($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('profile.wallet',['user'=>$user]);
    }
    public function walletHistory(){


        return view('profile.wallet.wallet-history');

    }
    public function purchaseHistory(){


        return view('profile.wallet.purchase-history');
    }
}
