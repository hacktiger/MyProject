<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DevLoginController extends Controller
{


	public function __construct(){
		$this->middleware('guest:dev');
	}
    //
    public function showLoginForm(){
    	return view('auth.dev-login');
    }

    public function login(Request $request){
    	// Validate form data
    	$this->validate($request, [
    		'email'  => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	// Attempt to log user
    	if(Auth::guard('dev')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
    		// if successful, redirect
    		return redirect()->intended(route('dev.dashboard'));
    	}
    	//if unsuccess , redirect -> login
    	return redirect()->back()->withInput($request ->only('email','remember'));	
    }
}
