<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use App\rating;

class ProfileController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
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
        //
        $user = User::find($id);

        return view('profile.show-profile', ['user'=>$user]); 
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
        //
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
