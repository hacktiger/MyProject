<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
	// Test view function
    public function viewIndex(){
    	return view('index');
    }
    //
    public function viewRegister(){
    	return view('layouts.register');
    }
}
