<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;


class ProfileController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->only( ['index','show']);
        $this->middleware('admin')->except( ['index','show','edit', 'update']);
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
        //get user
        $user = User::find($id);
        // get owned games
        $owned_games = DB::table('sales_log')
                            ->leftJoin('users', 'sales_log.user_id','=','users.id')
                            ->join('games','sales_log.game_title','=','games.title')
                            ->select(['sales_log.game_title', 'games.slug','games.avg_rating', 'games.upload_by','games.image'])
                            ->where('sales_log.user_id', $id)
                            ->paginate(12);
        
        
        return view('profile.show-profile', ['user'=>$user, 'owned_games'=>$owned_games]); 
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
        var_dump($profile);
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
        //
        //find it
        $user =User::find($id);
        //delete it
        $user->delete();
        // Session flash
        return redirect('/profile')->with('success','User Deleted');
    }

    public function makeAdmin($id){
        //
        DB::table('users')->where('id',$id)->update([
            'auth_level' => 'admin',
        ]);

        return redirect('/profile');
    }

    public function dropAdmin($id){
        //
        DB::table('users')->where('id',$id)->update([
            'auth_level' => 'casual',
        ]);

        return redirect('/profile');
    }
}
